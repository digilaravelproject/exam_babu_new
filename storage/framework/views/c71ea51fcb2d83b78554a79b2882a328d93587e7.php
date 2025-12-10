<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Exam Babu')); ?></title>

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased">

    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden bg-gray-100">

        <div x-show="sidebarOpen" class="fixed inset-0 z-40 flex md:hidden" role="dialog" aria-modal="true" x-cloak>

            <div x-show="sidebarOpen"
                 x-transition:enter="transition-opacity ease-linear duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-linear duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-gray-600 bg-opacity-75"
                 @click="sidebarOpen = false"
                 aria-hidden="true"></div>

            <div x-show="sidebarOpen"
                 x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="-translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="-translate-x-full"
                 class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-blue-900">

                <div class="absolute top-0 right-0 pt-2 -mr-12">
                    <button type="button" class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                        <span class="sr-only">Close sidebar</span>
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex items-center flex-shrink-0 px-4 pb-4 border-b border-gray-100 border-opacity-10">
                    <a href="<?php echo e(route('welcome')); ?>">
                        <span class="text-xl font-bold text-white">Exam Babu</span>
                    </a>
                </div>

                <div class="flex-1 h-0 mt-4 overflow-y-auto">
                    <?php echo $__env->make('layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

            <div class="flex-shrink-0 w-14"></div>
        </div>

        <div class="hidden bg-gray-800 border-r border-gray-800 md:flex md:flex-shrink-0">
            <div class="flex flex-col w-72">
                <div class="flex flex-col flex-grow pb-4 overflow-y-auto border-r border-gray-200">
                    <div class="flex items-center flex-shrink-0 h-16 px-6 border-b border-gray-100 border-opacity-10">
                         <a href="<?php echo e(route('welcome')); ?>">
                            <span class="text-2xl font-bold text-white">Exam Babu</span>
                        </a>
                    </div>
                    <div class="flex flex-col flex-grow mt-4">
                        <?php echo $__env->make('layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col flex-1 w-0 w-full mx-auto md:px-0">

            <div class="relative z-20 flex flex-shrink-0 h-16 bg-white border-gray-200 sm:border-b lg:border-none">

                <button type="button" class="px-4 text-gray-500 border-b border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden" @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>

                <div class="flex justify-between flex-1 max-w-5xl px-4 mx-auto border-b border-gray-200 md:px-0">

                    <div class="flex flex-1">
                        <form class="flex w-full md:ml-0" action="#" method="GET">
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input name="search" class="block w-full h-full py-2 pl-10 pr-3 text-gray-900 placeholder-gray-500 border-transparent focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Search" type="search">
                            </div>
                        </form>
                    </div>

                    <div class="flex items-center ml-4 md:ml-6">

                        <div class="flex items-center px-3 py-1 text-blue-600 rounded-full bg-blue-50">
                            <span class="mr-1 font-bold"><?php echo e(Auth::user()->wallet_balance ?? 0); ?></span> Pts
                        </div>

                        <div class="relative ml-3" x-data="{ dropdownOpen: false }">
                            <div>
                                <button @click="dropdownOpen = !dropdownOpen" type="button" class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full" src="<?php echo e(Auth::user()->profile_photo_url); ?>" alt="">
                                    <span class="hidden ml-2 font-medium text-gray-700 md:block"><?php echo e(Auth::user()->first_name); ?></span>
                                </button>
                            </div>

                            <div x-show="dropdownOpen"
                                 @click.away="dropdownOpen = false"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-0 z-50 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" style="display: none;">

                                <div class="px-4 py-2 border-b">
                                    <p class="text-sm text-gray-700"><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></p>
                                </div>

                                <a href="<?php echo e(route('profile.show')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="<?php echo e(route('user_subscriptions')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Subscriptions</a>
                                <a href="<?php echo e(route('user_payments')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">My Payments</a>

                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">Sign out</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="max-w-5xl px-4 py-6 mx-auto sm:px-6 md:px-0">

                    <?php if(session('success')): ?>
                        <div class="relative px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
                            <span class="block sm:inline"><?php echo e(session('success')); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="relative px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if (! empty(trim($__env->yieldContent('header')))): ?>
                        <div class="mb-6">
                            <?php echo $__env->yieldContent('header'); ?>
                        </div>
                    <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?>

                </div>
            </main>
        </div>
    </div>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Digi_Laravel_Prrojects\Exam-Backup-Update\resources\views/layouts/app.blade.php ENDPATH**/ ?>