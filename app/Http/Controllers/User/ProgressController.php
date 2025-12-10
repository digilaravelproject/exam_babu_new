<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ExamSession;
use App\Models\PracticeSession;
use App\Models\QuizSession;
use App\Repositories\UserRepository;
use App\Transformers\Platform\QuizSessionCardTransformer;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->middleware(['role:guest|student|employee']);
        $this->repository = $repository;
    }

    /**
     * Helper function to get Navigation Steps manually
     * This fixes the "Undefined array key" error
     */
    private function getSteps()
    {
        return [
            ['name' => 'my_progress', 'label' => 'My Progress'],
            ['name' => 'my_quizzes', 'label' => 'My Quizzes'],
            ['name' => 'my_exams',    'label' => 'My Exams'],
            ['name' => 'my_practice', 'label' => 'My Practice'],
        ];
    }

    /**
     * User My Progress Screen (Pending Sessions)
     */
    public function myProgress()
    {
        $quizSessions = QuizSession::with(['quiz' => function($query) {
            $query->with('quizType:id,name');
        }, 'quizSchedule'])->where('user_id', auth()->user()->id)->pending()->get();

        return view('user.progress.index', [
            'steps' => $this->getSteps(), // Fixed here
            'quizSessions' => fractal($quizSessions, new QuizSessionCardTransformer())->toArray()['data']
        ]);
    }

    /**
     * User My Quizzes Screen (History)
     */
    public function myQuizzes()
    {
        $sessions = QuizSession::with('quiz:id,slug,title')
            ->where('user_id', auth()->user()->id)
            ->where('status', '=', 'completed')
            ->orderBy('completed_at', 'desc')
            ->paginate(10);

        return view('user.progress.quizzes', [
            'steps' => $this->getSteps(), // Fixed here
            'sessions' => $sessions,
        ]);
    }

    /**
     * User My Exams Screen (History)
     */
    public function myExams()
    {
        $sessions = ExamSession::with('exam:id,slug,title')
            ->where('user_id', auth()->user()->id)
            ->where('status', '=', 'completed')
            ->orderBy('completed_at', 'desc')
            ->paginate(10);

        return view('user.progress.exams', [
            'steps' => $this->getSteps(), // Fixed here
            'sessions' => $sessions,
        ]);
    }

    /**
     * User My Practice Screen (History)
     */
    public function myPractice()
    {
        $sessions = PracticeSession::with('practiceSet:id,slug,title')
            ->where('user_id', auth()->user()->id)
            ->where('status', '=', 'completed')
            ->orderBy('completed_at', 'desc')
            ->paginate(10);

        return view('user.progress.practice', [
            'steps' => $this->getSteps(), // Fixed here
            'sessions' => $sessions,
        ]);
    }
}
