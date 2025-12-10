<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ExamSchedule;
use App\Models\ExamType;
use App\Models\SubCategory;
use App\Settings\LocalizationSettings;
use App\Transformers\Platform\ExamCardTransformer;
use App\Transformers\Platform\ExamScheduleCardTransformer;
use App\Transformers\Platform\ExamTypeTransformer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;
use Inertia\Inertia;

class ExamDashboardController extends Controller
{
    private LocalizationSettings $localizationSettings;

    public function __construct(LocalizationSettings $localizationSettings)
    {
        $this->middleware(['role:guest|student|employee', 'verify.syllabus']);
        $this->localizationSettings = $localizationSettings;
    }

   /**
     * User's Exam Dashboard
     */
    public function exam()
    {
        $userGroups = auth()->user()->userGroups()->pluck('id');
        $category = auth()->user()->selectedSyllabus();

        // Fetch exams scheduled for current user
        $schedules = ExamSchedule::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('exam', function (Builder $query) use ($category) {
            $query->where('sub_category_id', '=', $category->id);
        })->with(['exam' => function($builder) {
            $builder->with(['subCategory:id,name', 'examType:id,name']);
        }])->orderBy('end_date', 'asc')->active()->limit(4)->get();

        // Fetch public exams types
        $examTypes = ExamType::active()->orderBy('name')->get();

        return view('user.exam_dashboard', [
            'examSchedules' => fractal($schedules, new ExamScheduleCardTransformer())->toArray()['data'],
            'examTypes' => fractal($examTypes, new ExamTypeTransformer())->toArray()['data'],
            'subscription' => request()->user()->hasActiveSubscription($category->id, 'exams')
        ]);
    }

   /**
     * Live Exams Screen (Combined Logic)
     */
    public function liveExams()
    {
        $userGroups = auth()->user()->userGroups()->pluck('id');
        $category = auth()->user()->selectedSyllabus();

        $schedules = ExamSchedule::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('exam', function (Builder $query) use ($category) {
            $query->where('sub_category_id', '=', $category->id);
        })->with(['exam' => function($builder) {
            $builder->with(['subCategory:id,name', 'examType:id,name']);
        }])->orderBy('end_date', 'asc')->active()->paginate(12); // Pagination added

        return view('user.live_exams', [
            'schedules' => $schedules, // Passing Paginator directly
            'subscription' => request()->user()->hasActiveSubscription($category->id, 'exams')
        ]);
    }

    /**
     * Fetch live exams api endpoint
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchLiveExams()
    {
        $userGroups = auth()->user()->userGroups()->pluck('id');
        $category = auth()->user()->selectedSyllabus();

        // Fetch exams scheduled for current user via user groups
        $schedules = ExamSchedule::whereHas('userGroups', function (Builder $query) use ($userGroups) {
            $query->whereIn('user_group_id', $userGroups);
        })->whereHas('exam', function (Builder $query) use ($category) {
            $query->where('sub_category_id', '=', $category->id);
        })->with(['exam' => function($builder) {
            $builder->with(['subCategory:id,name', 'examType:id,name']);
        }])->orderBy('end_date', 'asc')->active()->paginate(10);

        return response()->json([
            'schedules' => fractal($schedules, new ExamScheduleCardTransformer())->toArray()
        ], 200);
    }

  /**
     * Get Exams by type page (Combined Logic)
     */
    public function examsByType(ExamType $type)
    {
        $subCategory = auth()->user()->selectedSyllabus();
        $category = auth()->user()->selectedSyllabus();

        $exams = $type->exams()->has('questions')
            ->where('sub_category_id', '=', $subCategory->id)
            ->orderBy('exams.is_paid', 'asc')
            ->with(['subCategory:id,name', 'examType:id,name'])
            ->isPublic()->published()
            ->paginate(12); // Pagination added

        return view('user.exams_by_type', [
            'type' => $type,
            'exams' => $exams, // Passing Paginator directly
            'subscription' => request()->user()->hasActiveSubscription($category->id, 'exams')
        ]);
    }

    /**
     * Fetch exams by type
     *
     * @param ExamType $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchExamsByType(ExamType $type)
    {
        $subCategory = auth()->user()->selectedSyllabus();

        // Fetch public exams by exam type
        $exams = $type->exams()->has('questions')
            ->where('sub_category_id', '=', $subCategory->id)
            ->orderBy('exams.is_paid', 'asc')
            ->with(['subCategory:id,name', 'examType:id,name'])
            ->isPublic()->published()
            ->paginate(10);

        return response()->json([
            'exams' => fractal($exams, new ExamCardTransformer())->toArray(),
        ], 200);
    }
}
