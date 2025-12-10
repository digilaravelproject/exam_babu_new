@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-bold tracking-tight text-gray-800">{{ __('My Quizzes') }}</h1>
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
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">Quiz Name</th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">Completed On</th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">Score</th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">Status</th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-right text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($sessions as $session)
                                <tr class="transition hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $session->quiz->title }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        {{ $session->completed_at ? \Carbon\Carbon::parse($session->completed_at)->format('d M, Y') : '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">{{ $session->results_percentage ?? 0 }}%</div>
                                        <div class="text-xs text-gray-500">{{ $session->total_score }}/{{ $session->total_marks }} Pts</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if(strtolower($session->status) == 'passed' || $session->results_pass_status == 'Pass')
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Passed</span>
                                        @else
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">Failed</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="{{ route('quiz_results', ['quiz' => $session->quiz->slug, 'session' => $session->id]) }}" class="font-semibold text-blue-600 hover:text-blue-900">
                                            View Result
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
                <p class="text-gray-500">{{ __('No completed quizzes found.') }}</p>
            </div>
        @endif
    </div>
@endsection
