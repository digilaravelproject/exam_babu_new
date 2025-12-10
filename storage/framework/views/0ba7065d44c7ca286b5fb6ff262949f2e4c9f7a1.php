<?php $__env->startSection('header'); ?>
    <div class="flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-800">
                <?php echo e(__('Add Exams')); ?>

            </h1>
            <p class="mt-1 text-xs text-gray-500">Select a category to start your preparation</p>
        </div>

        <nav class="flex px-3 py-1 text-xs font-medium text-gray-500 bg-white border border-gray-100 rounded-full shadow-sm">
            <a href="<?php echo e(route('user_dashboard')); ?>" class="transition hover:text-blue-600">Dashboard</a>
            <span class="mx-2 text-gray-300">/</span>
            <span class="text-blue-600">Add Exams</span>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="py-6">

        <div class="relative p-6 mb-8 overflow-hidden text-center shadow-xl bg-gradient-to-br from-blue-700 via-blue-600 to-indigo-800 rounded-2xl sm:p-8">

            <div class="absolute top-0 right-0 w-40 h-40 -mt-10 -mr-10 bg-white rounded-full opacity-10 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-40 h-40 -mb-10 -ml-10 bg-blue-400 rounded-full opacity-20 blur-3xl"></div>

            <div class="relative z-10 max-w-3xl mx-auto">
                <span class="inline-block py-0.5 px-2 rounded-md bg-blue-800/50 border border-blue-400/30 text-blue-100 text-[10px] font-bold tracking-widest uppercase mb-3">
                    <?php echo e(__('Categories')); ?>

                </span>
                <h2 class="mb-2 text-2xl font-extrabold leading-tight tracking-tight text-white sm:text-3xl">
                    <?php echo e($category['title'] ?? 'Mock Tests & Comparative Ranking'); ?>

                </h2>
                <p class="max-w-xl mx-auto text-sm font-light text-blue-100 sm:text-base">
                    <?php echo e($category['subtitle'] ?? 'Start your journey towards success. Select a category below to explore available exams.'); ?>

                </p>
            </div>
        </div>

        <?php if(count($categories) > 0): ?>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('store.categories.show', ['category' => $cat['slug']])); ?>" class="block h-full group">
                        <div class="relative flex flex-col items-start h-full p-5 overflow-hidden transition-all duration-300 ease-out transform bg-white border border-gray-100 shadow-sm rounded-xl group-hover:-translate-y-1 group-hover:shadow-xl">

                            <div class="absolute top-0 left-0 w-full h-1 transition-opacity duration-300 opacity-0 bg-gradient-to-r from-blue-500 to-indigo-500 group-hover:opacity-100"></div>

                            <div class="flex items-center w-full mb-4">
                                <div class="flex items-center justify-center w-12 h-12 text-blue-600 transition-all duration-300 rounded-lg shadow-inner bg-blue-50 group-hover:bg-blue-600 group-hover:text-white">
                                    <span class="text-xl font-bold">
                                        <?php echo e(mb_substr($cat['name'], 0, 1, 'UTF-8')); ?>

                                    </span>
                                </div>

                                <div class="ml-auto text-blue-600 transition-all duration-300 transform translate-x-2 opacity-0 group-hover:opacity-100 group-hover:translate-x-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>

                            <div class="relative z-10 flex-1 w-full">
                                <h3 class="mb-1 text-lg font-bold text-gray-900 transition-colors group-hover:text-blue-700 line-clamp-1">
                                    <?php echo e($cat['name']); ?>

                                </h3>

                                <?php if(!empty($cat['short_description'])): ?>
                                    <p class="text-xs leading-relaxed text-gray-500 line-clamp-2">
                                        <?php echo e($cat['short_description']); ?>

                                    </p>
                                <?php else: ?>
                                    <p class="text-xs text-gray-400">Explore exams in this category.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="max-w-lg p-8 mx-auto mt-8 text-center bg-white border border-gray-300 border-dashed shadow-sm rounded-xl">
                <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 rounded-full bg-gray-50">
                    <svg class="w-6 h-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h3 class="mb-1 text-sm font-bold text-gray-900"><?php echo e(__('No categories found')); ?></h3>
                <p class="mb-4 text-xs text-gray-500"><?php echo e(__('Please check back later for new exam categories.')); ?></p>
                <a href="<?php echo e(route('user_dashboard')); ?>" class="inline-flex items-center px-4 py-2 text-xs font-medium text-gray-700 transition bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                    Back to Dashboard
                </a>
            </div>
        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Digi_Laravel_Prrojects\Exam-Backup-Update\resources\views/user/add_exams.blade.php ENDPATH**/ ?>