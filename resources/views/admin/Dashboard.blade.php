@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-4 px-4 sm:px-6 lg:px-8">

    {{-- Stats Grid --}}
    <div class="flex flex-wrap mb-6">
        <div class="w-full">
            <div class="w-full grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($stats as $stat)
                    @include('components.cards.dashboard-stat', [
                        'title' => $stat['title'],
                        'count' => $stat['count']
                    ])
                @endforeach
            </div>
        </div>
    </div>

    {{-- Help + Quick Links --}}
    <div class="flex flex-wrap mb-6">
        <div class="w-full">
            <div class="w-full grid sm:grid-cols-1 md:grid-cols-2 gap-8">
                
                @include('components.widgets.admin-help')

                @include('components.widgets.admin-quick-links')

            </div>
        </div>
    </div>

</div>
@endsection
