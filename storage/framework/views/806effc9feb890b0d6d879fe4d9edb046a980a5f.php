

<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-4 px-4 sm:px-6 lg:px-8">

    
    <div class="flex flex-wrap mb-6">
        <div class="w-full">
            <div class="w-full grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('components.cards.dashboard-stat', [
                        'title' => $stat['title'],
                        'count' => $stat['count']
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <div class="flex flex-wrap mb-6">
        <div class="w-full">
            <div class="w-full grid sm:grid-cols-1 md:grid-cols-2 gap-8">
                
                <?php echo $__env->make('components.widgets.admin-help', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('components.widgets.admin-quick-links', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\exam_babu_new\resources\views/Admin/Dashboard.blade.php ENDPATH**/ ?>