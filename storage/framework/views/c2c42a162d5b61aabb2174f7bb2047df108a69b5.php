<section id="explore" class="relative py-16 overflow-hidden bg-gray-50 sm:py-24">

    <div class="absolute top-0 left-0 w-64 h-64 -mt-10 -ml-10 bg-blue-100 rounded-full opacity-50 blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-64 h-64 -mb-10 -mr-10 bg-indigo-100 rounded-full opacity-50 blur-3xl"></div>

    <div class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="max-w-3xl mx-auto mb-16 text-center">
            <span class="px-3 py-1 text-sm font-bold tracking-widest text-blue-600 uppercase bg-blue-100 rounded-full">
                <?php echo e(__('Categories')); ?>

            </span>
            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <?php echo e($category['title'] ?? 'Explore Our Categories'); ?>

            </h2>
            <p class="mt-4 text-lg text-gray-500">
                <?php echo e($category['subtitle'] ?? 'Select a category below to start your journey towards success.'); ?>

            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('store.categories.show', $cat->slug)); ?>" class="block h-full group">
                    <div class="relative flex flex-col items-start h-full p-6 overflow-hidden transition-all duration-300 ease-out transform bg-white border border-gray-100 shadow-sm rounded-2xl group-hover:-translate-y-2 group-hover:shadow-2xl">

                        <div class="absolute top-0 left-0 w-full h-1 transition-transform duration-500 origin-left transform scale-x-0 bg-gradient-to-r from-blue-500 to-indigo-600 group-hover:scale-x-100"></div>

                        <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-gradient-to-br from-blue-50/50 to-transparent group-hover:opacity-100"></div>

                        <div class="relative z-10 w-full">
                            <div class="flex items-center justify-center mb-6 text-blue-600 transition-all duration-300 transform shadow-inner h-14 w-14 rounded-2xl bg-blue-50 group-hover:bg-blue-600 group-hover:text-white group-hover:rotate-6">
                                <span class="text-2xl font-bold">
                                    <?php echo e(mb_substr($cat->name, 0, 1, 'UTF-8')); ?>

                                </span>
                            </div>

                            <h3 class="mb-2 text-xl font-bold text-gray-900 transition-colors group-hover:text-blue-700">
                                <?php echo e($cat->name); ?>

                            </h3>

                            <p class="mb-6 text-sm text-gray-500 line-clamp-2 group-hover:text-gray-600">
                                <?php echo e($cat->short_description ?? __('Explore comprehensive exams, practice sets, and study materials in this category.')); ?>

                            </p>

                            <div class="flex items-center justify-between pt-4 mt-auto transition-colors border-t border-gray-100 group-hover:border-blue-100">
                                <span class="text-sm font-bold text-blue-600 group-hover:underline decoration-2 underline-offset-4">
                                    <?php echo e(__('Explore')); ?>

                                </span>
                                <div class="flex items-center justify-center w-8 h-8 text-gray-400 transition-all duration-300 rounded-full bg-gray-50 group-hover:bg-blue-600 group-hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</section>
<?php /**PATH C:\xampp\htdocs\exam_babu_new\resources\views/components/categories.blade.php ENDPATH**/ ?>