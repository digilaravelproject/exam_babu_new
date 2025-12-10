@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">{{ $type->name }}</h1>
            <p class="text-xs text-gray-500">Browse all exams in this category</p>
        </div>
        <a href="{{ route('exam_dashboard') }}" class="text-sm text-gray-500 hover:text-blue-600">&larr; Back</a>
    </div>
@endsection

@section('content')
<div class="py-6">

    @if($exams->count() > 0)
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($exams as $exam)
                <div class="overflow-hidden transition-all duration-300 transform bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-lg hover:-translate-y-1">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center justify-center w-10 h-10 font-bold text-blue-600 rounded-lg bg-blue-50">
                                {{ mb_substr($exam->title, 0, 1, 'UTF-8') }}
                            </div>
                            @if($exam->is_paid)
                                <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"/></svg>
                            @endif
                        </div>

                        <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 min-h-[3.5rem]">
                            {{ $exam->title }}
                        </h3>

                        <div class="flex items-center mb-6 space-x-4 text-xs text-gray-500">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $exam->duration }} mins
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                {{ $exam->total_questions }} Qns
                            </span>
                        </div>

                        @if($exam->is_paid && !$subscription)
                            <a href="{{ route('pricing') }}" class="block w-full px-4 py-2 font-bold text-center text-gray-800 transition bg-gray-100 rounded hover:bg-gray-200">
                                Unlock Premium
                            </a>
                        @else
                            <a href="{{ route('exam_instructions', ['slug' => $exam->slug]) }}" class="block w-full px-4 py-2 font-bold text-center text-white transition bg-blue-600 rounded shadow-md hover:bg-blue-700 shadow-blue-500/30">
                                Start Practice
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $exams->links() }}
        </div>
    @else
        <div class="py-12 text-center">
            <div class="inline-block p-4 mb-4 rounded-full bg-blue-50">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900">No exams found</h3>
            <p class="text-gray-500">Check back later for new exams in this category.</p>
        </div>
    @endif

</div>
@endsection
