<?php $__env->startSection('header'); ?>
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold tracking-tight text-gray-800"><?php echo e(__('Exams Dashboard')); ?></h1>
        <nav class="flex px-3 py-1 text-xs font-medium text-gray-500 bg-white border border-gray-100 rounded-full shadow-sm">
            <a href="<?php echo e(route('user_dashboard')); ?>" class="transition hover:text-blue-600">Dashboard</a>
            <span class="mx-2 text-gray-300">/</span>
            <span class="text-blue-600">Exams</span>
        </nav>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="py-6 space-y-10">

    <div class="relative">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <div class="relative flex w-3 h-3">
                  <span class="absolute inline-flex w-full h-full bg-red-400 rounded-full opacity-75 animate-ping"></span>
                  <span class="relative inline-flex w-3 h-3 bg-red-500 rounded-full"></span>
                </div>
                <h2 class="text-xl font-bold text-gray-800">Live & Scheduled Exams</h2>
            </div>
            <a href="<?php echo e(route('live_exams')); ?>" class="text-sm font-semibold text-blue-600 hover:text-blue-800 hover:underline">View All &rarr;</a>
        </div>

        <?php if(count($examSchedules) > 0): ?>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
                <?php $__currentLoopData = $examSchedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col overflow-hidden transition-all duration-300 bg-white border border-gray-100 shadow-sm group rounded-xl hover:shadow-lg sm:flex-row">
                        <div class="sm:w-2 bg-gradient-to-b from-blue-500 to-indigo-600"></div>

                        <div class="flex-1 p-5">
                            <div class="flex items-start justify-between mb-2">
                                <span class="px-2 py-1 text-xs font-bold tracking-wider text-blue-700 uppercase rounded bg-blue-50">
                                    <?php echo e($exam['type'] ?? 'Exam'); ?>

                                </span>
                                <?php if($exam['status'] == 'active'): ?>
                                    <span class="flex items-center text-xs font-bold text-green-600">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span> LIVE
                                    </span>
                                <?php else: ?>
                                    <span class="text-xs font-medium text-gray-400"><?php echo e($exam['status']); ?></span>
                                <?php endif; ?>
                            </div>

                            <h3 class="mb-1 text-lg font-bold text-gray-900 transition-colors group-hover:text-blue-600">
                                <?php echo e($exam['title']); ?>

                            </h3>
                            <p class="mb-4 text-xs text-gray-500">
                                <?php echo e($exam['schedule_type'] === 'flexible' ? 'Flexible Schedule' : 'Fixed Schedule'); ?>

                            </p>

                            <div class="flex items-center justify-between mt-auto">
                                <div class="text-xs text-gray-500">
                                    <span class="block">Ends: <?php echo e($exam['end_date']); ?></span>
                                </div>

                                <?php if($exam['paid'] && !$subscription): ?>
                                    <a href="<?php echo e(route('pricing')); ?>" class="inline-flex items-center px-4 py-2 text-xs font-bold text-white uppercase transition bg-gray-800 rounded hover:bg-gray-700">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                        Unlock
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('exam_schedule_instructions', ['exam' => $exam['slug'], 'schedule' => $exam['code']])); ?>" class="inline-flex items-center px-4 py-2 text-xs font-bold text-white uppercase transition bg-blue-600 rounded shadow-md hover:bg-blue-700 shadow-blue-500/30">
                                        Start Exam
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="p-8 text-center border border-gray-300 border-dashed bg-gray-50 rounded-xl">
                <p class="text-gray-500">No live exams scheduled at the moment.</p>
            </div>
        <?php endif; ?>
    </div>

    <div>
        <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800">Browse by Category</h2>
            <p class="text-sm text-gray-500">Select an exam type to practice</p>
        </div>

        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            <?php $__currentLoopData = $examTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('exams_by_type', ['type' => $type['slug']])); ?>" class="flex flex-col items-center justify-center p-6 transition-all duration-300 transform bg-white border border-gray-100 shadow-sm group rounded-xl hover:shadow-lg hover:border-blue-200 hover:-translate-y-1">

                    <div class="flex items-center justify-center w-12 h-12 mb-3 text-blue-600 transition-colors duration-300 rounded-full bg-blue-50 group-hover:bg-blue-600 group-hover:text-white">
                        <span class="text-xl font-bold"><?php echo e(mb_substr($type['name'], 0, 1, 'UTF-8')); ?></span>
                    </div>

                    <h3 class="text-sm font-bold text-center text-gray-900 transition-colors group-hover:text-blue-600">
                        <?php echo e($type['name']); ?>

                    </h3>
                    <p class="mt-1 text-xs text-gray-400"><?php echo e($type['exams_count'] ?? 0); ?> Exams</p>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Digi_Laravel_Prrojects\Exam-Backup-Update\resources\views/user/exam_dashboard.blade.php ENDPATH**/ ?>