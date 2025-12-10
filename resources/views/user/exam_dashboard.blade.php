@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold tracking-tight text-gray-800">{{ __('Exams Dashboard') }}</h1>
        <nav class="flex px-3 py-1 text-xs font-medium text-gray-500 bg-white border border-gray-100 rounded-full shadow-sm">
            <a href="{{ route('user_dashboard') }}" class="transition hover:text-blue-600">Dashboard</a>
            <span class="mx-2 text-gray-300">/</span>
            <span class="text-blue-600">Exams</span>
        </nav>
    </div>
@endsection

@section('content')
<div class="py-6 space-y-10">

    <div class="relative">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <div class="relative flex w-3 h-3">
                  <span class="absolute inline-flex w-full h-full bg-red-400 rounded-full opacity-75 animate-ping"></span>
                  <span class="relative inline-flex w-3 h-3 bg-red-500 rounded-full"></span>
                </div>
                <h2 class="text-xl font-bold text-gray-800">Live & Scheduled Exams</h2>
            </div>
            <a href="{{ route('live_exams') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800 hover:underline">View All &rarr;</a>
        </div>

        @if(count($examSchedules) > 0)
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
                @foreach($examSchedules as $exam)
                    <div class="flex flex-col overflow-hidden transition-all duration-300 bg-white border border-gray-100 shadow-sm group rounded-xl hover:shadow-lg sm:flex-row">
                        <div class="sm:w-2 bg-gradient-to-b from-blue-500 to-indigo-600"></div>

                        <div class="flex-1 p-5">
                            <div class="flex items-start justify-between mb-2">
                                <span class="px-2 py-1 text-xs font-bold tracking-wider text-blue-700 uppercase rounded bg-blue-50">
                                    {{ $exam['type'] ?? 'Exam' }}
                                </span>
                                @if($exam['status'] == 'active')
                                    <span class="flex items-center text-xs font-bold text-green-600">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span> LIVE
                                    </span>
                                @else
                                    <span class="text-xs font-medium text-gray-400">{{ $exam['status'] }}</span>
                                @endif
                            </div>

                            <h3 class="mb-1 text-lg font-bold text-gray-900 transition-colors group-hover:text-blue-600">
                                {{ $exam['title'] }}
                            </h3>
                            <p class="mb-4 text-xs text-gray-500">
                                {{ $exam['schedule_type'] === 'flexible' ? 'Flexible Schedule' : 'Fixed Schedule' }}
                            </p>

                            <div class="flex items-center justify-between mt-auto">
                                <div class="text-xs text-gray-500">
                                    <span class="block">Ends: {{ $exam['end_date'] }}</span>
                                </div>

                                @if($exam['paid'] && !$subscription)
                                    <a href="{{ route('pricing') }}" class="inline-flex items-center px-4 py-2 text-xs font-bold text-white uppercase transition bg-gray-800 rounded hover:bg-gray-700">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                        Unlock
                                    </a>
                                @else
                                    <a href="{{ route('exam_schedule_instructions', ['exam' => $exam['slug'], 'schedule' => $exam['code']]) }}" class="inline-flex items-center px-4 py-2 text-xs font-bold text-white uppercase transition bg-blue-600 rounded shadow-md hover:bg-blue-700 shadow-blue-500/30">
                                        Start Exam
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-8 text-center border border-gray-300 border-dashed bg-gray-50 rounded-xl">
                <p class="text-gray-500">No live exams scheduled at the moment.</p>
            </div>
        @endif
    </div>

    <div>
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800">Browse by Category</h2>
            <p class="text-sm text-gray-500">Select an exam type to practice</p>
        </div>

        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            @foreach($examTypes as $type)
                <a href="{{ route('exams_by_type', ['type' => $type['slug']]) }}" class="flex flex-col items-center justify-center p-6 transition-all duration-300 transform bg-white border border-gray-100 shadow-sm group rounded-xl hover:shadow-lg hover:border-blue-200 hover:-translate-y-1">

                    <div class="flex items-center justify-center w-12 h-12 mb-3 text-blue-600 transition-colors duration-300 rounded-full bg-blue-50 group-hover:bg-blue-600 group-hover:text-white">
                        <span class="text-xl font-bold">{{ mb_substr($type['name'], 0, 1, 'UTF-8') }}</span>
                    </div>

                    <h3 class="text-sm font-bold text-center text-gray-900 transition-colors group-hover:text-blue-600">
                        {{ $type['name'] }}
                    </h3>
                    <p class="mt-1 text-xs text-gray-400">{{ $type['exams_count'] ?? 0 }} Exams</p>
                </a>
            @endforeach
        </div>
    </div>

</div>
@endsection
