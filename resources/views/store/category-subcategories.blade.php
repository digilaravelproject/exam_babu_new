@extends('store.layout')

@section('title', $parentCategory->name)

@section('content')
    <section class="border-b border-gray-100">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:py-28 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-secondary font-semibold tracking-wide uppercase">
                    {{ $parentCategory->name }}
                </h2>
                @if($parentCategory->short_description)
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        {{ $parentCategory->short_description }}
                    </p>
                @endif
            </div>

            <div class="mt-10 flex flex-wrap items-center justify-center gap-7">
                @forelse($subCategories as $subCategory)
                    <div class="w-full sm:w-64 p-4 rounded border hover:shadow-lg">
                        <div class="flex justify-center items-center flex-col">
                            <div class="flex justify-center items-center flex-col mt-3">
                                {{-- Same card design: show subcategory name and parent category name --}}
                                <p class="font-medium leading-none text-gray-800">{{ $subCategory->name }}</p>
                               
                            </div>
                        </div>
                        <div class="mt-8 w-full sm:w-56 h-9">
                            <a href="{{ route('explore', $subCategory->slug) }}" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 hover:opacity-90 flex items-center justify-center flex-1 h-full py-3 px-20 bg-primary border rounded border-primary">
                                <p class="text-sm font-medium leading-none text-white">{{ __('Explore') }}</p>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center w-full mt-6">
                        {{ __('No subcategories available for this category.') }}
                    </p>
                @endforelse
            </div>
        </div>
    </section>
@endsection


