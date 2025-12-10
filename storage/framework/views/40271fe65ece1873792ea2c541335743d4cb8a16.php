

<?php $__env->startSection('header'); ?>
    <h1 class="text-2xl font-bold tracking-tight text-gray-800"><?php echo e(__('My Progress')); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="py-6">

        <?php echo $__env->make('user.progress.partials.navigator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if(count($quizSessions) > 0): ?>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                <?php $__currentLoopData = $quizSessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col p-6 transition-shadow bg-white border border-gray-100 shadow-sm rounded-xl hover:shadow-md">
                        <div class="flex items-start justify-between mb-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                In Progress
                            </span>
                            <span class="text-xs text-gray-400"><?php echo e($session['started_at'] ?? 'Recently'); ?></span>
                        </div>

                        <h3 class="mb-2 text-lg font-bold text-gray-900 line-clamp-2">
                            <?php echo e($session['name']); ?>

                        </h3>

                        <div class="pt-4 mt-auto">
                            <?php if(empty($session['quizSchedule'])): ?>
                                <a href="<?php echo e(route('init_quiz', ['slug' => $session['slug']])); ?>" class="block w-full py-2 font-semibold text-center text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                                    <?php echo e(__('Resume Quiz')); ?>

                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('init_quiz_schedule', ['quiz' => $session['slug'], 'schedule' => $session['quizSchedule']])); ?>" class="block w-full py-2 font-semibold text-center text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                                    <?php echo e(__('Resume Scheduled Quiz')); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="p-12 text-center bg-white border border-gray-300 border-dashed rounded-xl">
                <div class="w-12 h-12 mx-auto mb-4 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900"><?php echo e(__('No pending sessions')); ?></h3>
                <p class="mt-1 text-gray-500">Great job! You have completed all your started quizzes.</p>
                <div class="mt-6">
                    <a href="<?php echo e(route('quiz_dashboard')); ?>" class="font-medium text-blue-600 hover:text-blue-800">Start a new Quiz &rarr;</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Digi_Laravel_Prrojects\Exam-Backup-Update\resources\views/user/progress/index.blade.php ENDPATH**/ ?>