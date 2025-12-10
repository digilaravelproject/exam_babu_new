@props(['title' => 'No Data Found', 'message' => ''])

<div class="flex flex-col items-center justify-center px-4 py-10 text-center">
    <div class="p-6 mb-4 rounded-full bg-gray-50">
        <svg class="w-12 h-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
        </svg>
    </div>

    <h3 class="text-lg font-bold text-gray-800">{{ __($title) }}</h3>

    @if($message)
        <p class="max-w-xs mx-auto mt-1 text-sm text-gray-500">{{ __($message) }}</p>
    @endif

    <div class="mt-4">
        {{ $slot }}
    </div>
</div>
