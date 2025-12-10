@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-bold tracking-tight text-gray-800">{{ __('My Practice Sessions') }}</h1>
@endsection

@section('content')
    <div class="py-6">

        @include('user.progress.partials.navigator')

        @if($sessions->count() > 0)
            <div class="overflow-hidden bg-white border border-gray-100 shadow-sm rounded-xl">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Practice Set Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Completed On
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Points Earned
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-right text-gray-500 uppercase">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($sessions as $session)
                                <tr class="transition duration-150 ease-in-out hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">
                                            {{ $session->practiceSet->title ?? 'Practice Set' }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $session->completed_at ? \Carbon\Carbon::parse($session->completed_at)->format('d M, Y') : '-' }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <span class="text-sm font-bold text-gray-900">
                                                {{ $session->total_points_earned ?? 0 }} Pts
                                            </span>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                            Completed
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="{{ route('practice_session_analysis', ['practiceSet' => $session->practiceSet->slug, 'session' => $session->id]) }}"
                                           class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded text-blue-700 bg-blue-100 hover:bg-blue-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            View Analysis
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    {{ $sessions->links() }}
                </div>
            </div>
        @else
            <div class="p-12 text-center bg-white border border-gray-300 border-dashed rounded-xl">
                <div class="w-12 h-12 mx-auto mb-3 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900">{{ __('No practice sessions found') }}</h3>
                <p class="mt-1 text-gray-500">Start practicing to see your progress here.</p>
                <div class="mt-6">
                    <a href="{{ route('learn_practice') }}" class="font-medium text-blue-600 hover:text-blue-800">
                        Go to Practice Section &rarr;
                    </a>
                </div>
            </div>
        @endif

    </div>
@endsection
