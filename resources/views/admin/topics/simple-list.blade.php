<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topics Reference - Exam Babu</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/primeicons/primeicons.css') }}" rel="stylesheet">
    <style>
        .font-mono { font-family: Monaco, Consolas, "Liberation Mono", monospace }
        .vgt-table.striped tbody tr:nth-of-type(odd) { background-color: rgba(249, 250, 251, 0.7) }
    </style>
</head>
<body class="bg-gray-50">
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 rounded-t-lg">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-semibold text-gray-800">Topics Reference List</h2>
                <a href="{{ url()->previous() }}" 
                   class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Dashboard
                </a>
            </div>
        </div>
        
        <div class="overflow-x-auto p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider w-32">Topic ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Skill</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($topics as $topic)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-3.5 text-sm font-mono text-blue-600 font-medium">{{ $topic->id }}</td>
                        <td class="px-6 py-3.5 text-sm text-gray-900 font-medium">{{ $topic->name }}</td>
                        <td class="px-6 py-3.5 text-sm text-gray-600">{{ $topic->skill->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 rounded-b-lg">
            <div class="flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    Showing {{ $topics->firstItem() }} to {{ $topics->lastItem() }} of {{ $topics->total() }} results
                </div>
                <div class="flex space-x-2">
                    {{ $topics->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('vendor/nprogress/nprogress.js') }}"></script>
</body>
</html> 