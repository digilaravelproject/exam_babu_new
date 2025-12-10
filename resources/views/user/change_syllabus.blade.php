@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">{{ __('Update Syllabus') }}</h1>
            <p class="mt-1 text-sm text-gray-500">Select the category you want to focus on.</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="py-8">

        @if(count($categories) > 0)
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                @foreach($categories as $category)
                    <div onclick="document.getElementById('form-{{ $category['code'] }}').submit();"
                         class="relative w-full overflow-hidden transition-all duration-300 transform bg-white border border-gray-200 shadow-sm cursor-pointer group rounded-2xl hover:shadow-2xl hover:-translate-y-1 hover:border-blue-500 hover:z-10">

                        <div class="absolute flex items-center justify-center w-6 h-6 transition-colors duration-300 border-2 border-gray-300 rounded-full top-4 right-4 group-hover:border-blue-500 group-hover:bg-blue-500">
                            <svg class="w-4 h-4 text-white transition-opacity duration-300 opacity-0 group-hover:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>

                        <div class="absolute inset-0 transition-opacity duration-500 opacity-0 pointer-events-none bg-gradient-to-br from-blue-50/50 via-transparent to-transparent group-hover:opacity-100"></div>

                        <div class="relative p-8 flex flex-col items-center text-center h-full justify-center min-h-[180px]">

                            <div class="flex items-center justify-center mb-5 text-blue-600 transition-transform duration-300 shadow-inner h-14 w-14 rounded-2xl bg-blue-50 group-hover:scale-110 group-hover:rotate-3">
                                <span class="text-2xl font-bold">
                                    {{ mb_substr($category['name'], 0, 1, 'UTF-8') }}
                                </span>
                            </div>

                            <h3 class="mb-3 text-lg font-bold leading-tight text-gray-800 transition-colors group-hover:text-blue-700">
                                {{ $category['name'] }}
                            </h3>

                            <div class="flex flex-wrap justify-center gap-2">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-gray-100 text-gray-600 border border-gray-200 group-hover:bg-white group-hover:text-blue-600 group-hover:border-blue-200 transition-colors">
                                    {{ $category['category'] ?? 'General' }}
                                </span>
                                @if(isset($category['type']))
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-indigo-50 text-indigo-600 border border-indigo-100">
                                        {{ $category['type'] }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <form id="form-{{ $category['code'] }}" action="{{ route('update_syllabus') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="category" value="{{ $category['code'] }}">
                        </form>

                        <div class="absolute bottom-0 left-0 w-full h-1 transition-transform duration-300 origin-left transform scale-x-0 bg-gradient-to-r from-blue-500 to-indigo-600 group-hover:scale-x-100"></div>
                    </div>
                @endforeach
            </div>
        @else
            <x-card.empty-data title="No Syllabus Found" message="We couldn't find any categories to display right now." />
        @endif

    </div>
@endsection
