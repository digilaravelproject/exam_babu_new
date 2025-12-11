<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title & Meta --}}
    <title>@yield('title', 'Exam Babu')</title>
    <meta name="description"
          content="@yield('meta_description', '#dharmaday #mpsc #Bhumiabhilekh #thane #pune #nasik #mocktests #GMC #mahaurja #mpscrajyaseva')">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('storage/site/favicon.jpg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">

    <!-- Styles (same as your original) -->
    <link rel="stylesheet" href="{{ asset('vendor/primeicons/primeicons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/nprogress/nprogress.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/katex/katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        :root {
            /* Custom Theme Configuration */
            --custom-font: "Inter";
            --primary-color: #22435d;
            --secondary-color: #eb8f28;
        }
    </style>

    <!-- Ziggy + route() JS (paste your existing script block here if still needed) -->
    {{-- 
    <script type="text/javascript">
        // const Ziggy = { ... your existing long JS object ... };
        // route() helper JS...
    </script>
    --}}

    <script>
        window.CKEditorURL = "{{ asset('vendor/ckeditor/ckeditor.js') }}";
    </script>

    <script src="{{ asset('vendor/katex/katex.min.js') }}"></script>
    <script src="{{ asset('vendor/katex/contrib/auto-render.min.js') }}"></script>

    {{-- Your compiled JS (no Vite) – keep or remove as per your setup --}}
    <script src="{{ asset('js/manifest.js') }}" defer></script>
    <script src="{{ asset('js/vendor-vue.js') }}" defer></script>
    <script src="{{ asset('js/vendor.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    {{-- Main page content --}}
    @yield('content')

</body>
</html>
