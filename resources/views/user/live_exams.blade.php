@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800">{{ __('Live Exams') }}</h1>
        <a href="{{ route('exam_dashboard') }}" class="text-sm text-gray-500 hover:text-blue-600">&larr; Back</a>
    </div>
@endsection

@section('content')
<div class="py-6">

    @if($schedules->count() > 0)
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            @foreach($schedules as $schedule)
                <div class="flex flex-col p-6 transition bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md">
                    <div class="flex justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-800">{{ $schedule->exam->title }}</h3>
                        @if($schedule->exam->is_paid)
                            <span class="px-2 py-1 text-xs font-bold text-yellow-800 bg-yellow-100 rounded">PREMIUM</span>
                        @else
                            <span class="px-2 py-1 text-xs font-bold text-green-800 bg-green-100 rounded">FREE</span>
                        @endif
                    </div>

                    <div class="mb-4 space-y-1 text-sm text-gray-600">
                        <p><strong>Type:</strong> {{ $schedule->schedule_type }}</p>
                        <p><strong>Ends:</strong> {{ $schedule->end_date }}</p>
                    </div>

                    <div class="pt-4 mt-auto border-t border-gray-50">
                        @if($schedule->exam->is_paid && !$subscription)
                            <a href="{{ route('pricing') }}" class="block w-full py-2 text-center text-white transition bg-gray-800 rounded hover:bg-gray-700">
                                Unlock Premium
                            </a>
                        @else
                            <a href="{{ route('exam_schedule_instructions', ['exam' => $schedule->exam->slug, 'schedule' => $schedule->code]) }}" class="block w-full py-2 text-center text-white transition bg-blue-600 rounded hover:bg-blue-700">
                                Start Exam
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $schedules->links() }}
        </div>
    @else
        <div class="py-12 text-center bg-white border border-gray-300 border-dashed rounded-xl">
            <p class="text-gray-500">No live exams found.</p>
        </div>
    @endif

</div>
@endsection
