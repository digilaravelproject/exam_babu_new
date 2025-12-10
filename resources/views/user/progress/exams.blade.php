@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-bold tracking-tight text-gray-800">{{ __('My Exams') }}</h1>
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
                                <th class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase">Exam Name</th>
                                <th class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase">Completed</th>
                                <th class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase">Score</th>
                                <th class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-xs font-bold text-right text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($sessions as $session)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $session->exam->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($session->completed_at)->format('d M, Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-bold text-gray-900">{{ $session->percentage ?? 0 }}%</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                                            {{ strtolower($session->status) == 'passed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($session->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-right">
                                        <a href="{{ route('exam_results', ['exam' => $session->exam->slug, 'session' => $session->id]) }}" class="font-semibold text-blue-600 hover:text-blue-900">Results</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-gray-200">{{ $sessions->links() }}</div>
            </div>
        @else
            <div class="p-12 text-center text-gray-500 bg-white border border-gray-300 border-dashed rounded-xl">
                No completed exams found.
            </div>
        @endif
    </div>
@endsection
