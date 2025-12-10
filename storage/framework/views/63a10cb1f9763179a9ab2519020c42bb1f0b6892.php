<div class="mb-8">
    <div class="p-2 bg-white border border-gray-100 shadow-sm rounded-xl">
        <nav class="flex space-x-2 overflow-x-auto" aria-label="Tabs">
            <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route($step['name'])); ?>"
                   class="whitespace-nowrap px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200 focus:outline-none
                   <?php echo e(request()->routeIs($step['name'])
                      ? 'bg-blue-600 text-white shadow-md'
                      : 'text-gray-500 hover:text-gray-700 hover:bg-gray-50'); ?>">
                    <?php echo e(__($step['label'])); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </nav>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Digi_Laravel_Prrojects\Exam-Backup-Update\resources\views/user/progress/partials/navigator.blade.php ENDPATH**/ ?>