@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-800">{{ __('Dashboard') }}</h1>
            <p class="mt-1 text-sm text-gray-500">Welcome back, {{ Auth::user()->first_name }} 👋</p>
        </div>
        <a href="{{ route('add_exams') }}" class="items-center hidden px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-blue-600 border border-transparent rounded-md sm:inline-flex hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25">
            Explore New Exams
        </a>
    </div>
@endsection

@section('content')

    <div class="py-2">

        <div class="relative p-6 mb-8 overflow-hidden text-white shadow-xl bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl">
            <div class="relative z-10">
                <h2 class="text-xl font-bold">Ready to learn something new today?</h2>
                <p class="max-w-xl mt-2 text-blue-100">Check your active subscriptions below and continue your preparation journey.</p>
            </div>
            <div class="absolute top-0 right-0 w-40 h-40 transform translate-x-10 -translate-y-10 bg-white rounded-full opacity-10"></div>
        </div>

        @if(count($userSubscriptions) > 0)
            <div class="mb-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="pl-3 text-lg font-bold text-gray-800 border-l-4 border-blue-600">Active Subscriptions</h2>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach($userSubscriptions as $subscription)
                        <div class="flex flex-col h-full transition-all duration-300 transform bg-white border border-gray-100 shadow-sm group rounded-2xl hover:shadow-xl hover:-translate-y-1">

                            <div class="flex items-start justify-between p-5 border-b border-gray-50 bg-gray-50/50 rounded-t-2xl">
                                <div>
                                    <h3 class="text-lg font-bold leading-tight text-gray-900">{{ $subscription['plan'] }}</h3>
                                    <p class="mt-1 text-xs font-medium text-gray-500">Expires: {{ $subscription['ends'] }}</p>
                                </div>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-100 text-green-800">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                                    ACTIVE
                                </span>
                            </div>

                            <div class="flex-1 p-5">
                                @if(!empty($subscription['features']))
                                    <p class="mb-3 text-xs font-bold tracking-wider text-gray-400 uppercase">Included Features</p>
                                    <ul class="space-y-3">
                                        @foreach(array_slice($subscription['features'], 0, 4) as $feature) <li class="flex items-start text-sm text-gray-600">
                                                <svg class="flex-shrink-0 w-5 h-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                                <span class="line-clamp-1">{{ __($feature['name']) }}</span>
                                            </li>
                                        @endforeach
                                        @if(count($subscription['features']) > 4)
                                            <li class="text-xs font-medium text-blue-500 pl-7">+ {{ count($subscription['features']) - 4 }} more features</li>
                                        @endif
                                    </ul>
                                @endif
                            </div>

                            <div class="p-5 pt-0 mt-auto">
                                <a href="{{ route('exam_dashboard') }}" class="block w-full px-4 py-3 font-semibold text-center text-white transition duration-200 bg-gray-900 shadow-md hover:bg-blue-700 rounded-xl group-hover:shadow-lg">
                                    Go to Exams
                                    <span aria-hidden="true" class="ml-1">&rarr;</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="p-12 text-center bg-white border border-gray-300 border-dashed shadow-sm rounded-2xl">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 text-blue-500 rounded-full bg-blue-50">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">No active subscriptions</h3>
                <p class="mt-1 text-gray-500">Get started by selecting an exam category or purchasing a plan.</p>
                <div class="mt-6">
                    <a href="{{ route('add_exams') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Browse Exams
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
