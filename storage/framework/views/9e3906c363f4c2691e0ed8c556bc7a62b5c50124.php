<?php $__env->startSection('header'); ?>
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-800"><?php echo e(__('Live Exams')); ?></h1>
        <a href="<?php echo e(route('exam_dashboard')); ?>" class="text-sm text-gray-500 hover:text-blue-600">&larr; Back</a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="py-6">

    <?php if($schedules->count() > 0): ?>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex flex-col p-6 transition bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md">
                    <div class="flex justify-between mb-4">
                        <h3 class="text-lg font-bold text-gray-800"><?php echo e($schedule->exam->title); ?></h3>
                        <?php if($schedule->exam->is_paid): ?>
                            <span class="px-2 py-1 text-xs font-bold text-yellow-800 bg-yellow-100 rounded">PREMIUM</span>
                        <?php else: ?>
                            <span class="px-2 py-1 text-xs font-bold text-green-800 bg-green-100 rounded">FREE</span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-4 space-y-1 text-sm text-gray-600">
                        <p><strong>Type:</strong> <?php echo e($schedule->schedule_type); ?></p>
                        <p><strong>Ends:</strong> <?php echo e($schedule->end_date); ?></p>
                    </div>

                    <div class="pt-4 mt-auto border-t border-gray-50">
                        <?php if($schedule->exam->is_paid && !$subscription): ?>
                            <a href="<?php echo e(route('pricing')); ?>" class="block w-full py-2 text-center text-white transition bg-gray-800 rounded hover:bg-gray-700">
                                Unlock Premium
                            </a>
                        <?php else: ?>
                            <a href="<?php echo e(route('exam_schedule_instructions', ['exam' => $schedule->exam->slug, 'schedule' => $schedule->code])); ?>" class="block w-full py-2 text-center text-white transition bg-blue-600 rounded hover:bg-blue-700">
                                Start Exam
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-8">
            <?php echo e($schedules->links()); ?>

        </div>
    <?php else: ?>
        <div class="py-12 text-center bg-white border border-gray-300 border-dashed rounded-xl">
            <p class="text-gray-500">No live exams found.</p>
        </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Digi_Laravel_Prrojects\Exam-Backup-Update\resources\views/user/live_exams.blade.php ENDPATH**/ ?>