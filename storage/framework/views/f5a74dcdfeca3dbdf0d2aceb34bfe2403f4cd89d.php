<?php $__env->startSection('title', $parentCategory->name); ?>

<?php $__env->startSection('content'); ?>
    <section class="border-b border-gray-100">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:py-28 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-secondary font-semibold tracking-wide uppercase">
                    <?php echo e($parentCategory->name); ?>

                </h2>
                <?php if($parentCategory->short_description): ?>
                    <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        <?php echo e($parentCategory->short_description); ?>

                    </p>
                <?php endif; ?>
            </div>

            <div class="mt-10 flex flex-wrap items-center justify-center gap-7">
                <?php $__empty_1 = true; $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="w-full sm:w-64 p-4 rounded border hover:shadow-lg">
                        <div class="flex justify-center items-center flex-col">
                            <div class="flex justify-center items-center flex-col mt-3">
                                
                                <p class="font-medium leading-none text-gray-800"><?php echo e($subCategory->name); ?></p>
                               
                            </div>
                        </div>
                        <div class="mt-8 w-full sm:w-56 h-9">
                            <a href="<?php echo e(route('explore', $subCategory->slug)); ?>" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 hover:opacity-90 flex items-center justify-center flex-1 h-full py-3 px-20 bg-primary border rounded border-primary">
                                <p class="text-sm font-medium leading-none text-white"><?php echo e(__('Explore')); ?></p>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-gray-500 text-center w-full mt-6">
                        <?php echo e(__('No subcategories available for this category.')); ?>

                    </p>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('store.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Digi_Laravel_Prrojects\Exam-Backup-Update\resources\views/store/category-subcategories.blade.php ENDPATH**/ ?>