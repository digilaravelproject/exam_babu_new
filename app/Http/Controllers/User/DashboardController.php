<?php

/**
 * File name: DashboardController.php
 * Last modified: 18/07/21, 3:59 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ExamSchedule;
use App\Models\PracticeSession;
use App\Models\QuizSchedule;
use App\Models\SubCategory;
use App\Models\Subscription;
use App\Settings\CategorySettings;
use App\Settings\LocalizationSettings;
use App\Transformers\Platform\ExamScheduleCalendarTransformer;
use App\Transformers\Platform\PracticeSessionCardTransformer;
use App\Transformers\Platform\QuizScheduleCalendarTransformer;
use App\Transformers\User\UserSubscriptionTransformer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cookie;
use Inertia\Inertia;

class DashboardController extends Controller
{
    private LocalizationSettings $localizationSettings;

    public function __construct(LocalizationSettings $localizationSettings)
    {
        $this->middleware(['role:guest|student|employee', 'verify.syllabus']);
        $this->localizationSettings = $localizationSettings;
    }

    /**
     * User's Main Dashboard
     * @return \Illuminate\Contracts\View\View
     *
     */
    public function index()
    {
        $userGroups = auth()->user()->userGroups()->pluck('id');
        $minDate = Carbon::today()->timezone($this->localizationSettings->default_timezone);
        $maxDate = Carbon::today()->addMonths(1)->endOfMonth()->timezone($this->localizationSettings->default_timezone);
        $subCategory = auth()->user()->selectedSyllabus();

        // Fetch quizzes scheduled for current user via user groups
        $quizSchedules = QuizSchedule::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('quiz', function (Builder $query) use ($subCategory) {
            $query->where('sub_category_id', $subCategory->id);
        })->with('quiz')->orderBy('end_date', 'asc')->active()->limit(4)->get();

        // Fetch exams scheduled for current user via user groups
        $examSchedules = ExamSchedule::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('exam', function (Builder $query) use ($subCategory) {
            $query->where('sub_category_id', $subCategory->id);
        })->with('exam')->orderBy('end_date', 'asc')->active()->limit(4)->get();

        // Fetch current user in-completed practice sessions
        $practiceSessions = PracticeSession::with(['practiceSet' => function ($query) {
            $query->with('skill:id,name');
        }])->whereHas('practiceSet', function (Builder $query) use ($subCategory) {
            $query->where('sub_category_id', $subCategory->id);
        })->where('user_id', auth()->user()->id)->pending()
            ->orderBy('updated_at', 'desc')->limit(1)->get();

        // Fetch all active subscriptions for the user
        $userSubscriptions = Subscription::with(['plan' => function ($query) {
            $query->with('features:id,code,name');
        }])
            ->where('user_id', auth()->user()->id)
            ->where('status', 'active')
            ->where('ends_at', '>', now()->toDateTimeString())
            ->orderBy('ends_at', 'desc')
            ->get();

        // return Inertia::render('User/Dashboard', [
        //     'scheduleCalendar' => array_merge(fractal($quizSchedules, new QuizScheduleCalendarTransformer())->toArray()['data'],
        //         fractal($examSchedules, new ExamScheduleCalendarTransformer())->toArray()['data']),
        //     'practiceSessions' => fractal($practiceSessions, new PracticeSessionCardTransformer())->toArray()['data'],
        //     'userSubscriptions' => fractal($userSubscriptions, new UserSubscriptionTransformer())->toArray()['data'],
        //     'minDate' => $minDate,
        //     'maxDate' => $maxDate,
        // ]);
        return view('user.dashboard', [
            'scheduleCalendar' => array_merge(
                fractal($quizSchedules, new QuizScheduleCalendarTransformer())->toArray()['data'],
                fractal($examSchedules, new ExamScheduleCalendarTransformer())->toArray()['data']
            ),
            'practiceSessions' => fractal($practiceSessions, new PracticeSessionCardTransformer())->toArray()['data'],
            'userSubscriptions' => fractal($userSubscriptions, new UserSubscriptionTransformer())->toArray()['data'],
            'minDate' => $minDate,
            'maxDate' => $maxDate,
        ]);
    }

    /**
     * Add Exams page - Shows all categories
     *
     * @param CategorySettings $categorySettings
     * @return \Illuminate\Contracts\View\View
     */
    public function addExams(CategorySettings $categorySettings)
    {
        // Load only parent categories (unique), but eager-load active subcategories
        $categories = Category::with(['subCategories' => function ($query) {
            $query->where('is_active', true);
        }])
            ->where('is_active', true)
            ->orderBy('name', 'asc')
            ->limit($categorySettings->limit ?? 50)
            ->get();

        // return Inertia::render('User/AddExams', [
        //     'category' => $categorySettings->toArray(),
        //     'categories' => $categories->map(function ($category) {
        //         return [
        //             'id' => $category->id,
        //             'name' => $category->name,
        //             'slug' => $category->slug,
        //             'short_description' => $category->short_description,
        //         ];
        //     }),
        // ]);
        return view('user.add_exams', [
            'category' => $categorySettings->toArray(),
            'categories' => $categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'short_description' => $category->short_description,
                ];
            }),
        ]);
    }
}
