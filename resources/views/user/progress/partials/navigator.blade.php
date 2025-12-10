<div class="mb-8">
    <div class="p-2 bg-white border border-gray-100 shadow-sm rounded-xl">
        <nav class="flex space-x-2 overflow-x-auto" aria-label="Tabs">
            @foreach($steps as $step)
                <a href="{{ route($step['name']) }}"
                   class="whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 focus:outline-none
                   {{ request()->routeIs($step['name'])
                      ? 'bg-blue-600 text-white shadow-md'
                      : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50' }}">
                    {{ __($step['label']) }}
                </a>
            @endforeach
        </nav>
    </div>
</div>
