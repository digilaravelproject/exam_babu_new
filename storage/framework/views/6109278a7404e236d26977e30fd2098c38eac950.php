<?php $__env->startSection('header'); ?>
    <h1 class="text-2xl font-bold tracking-tight text-gray-800"><?php echo e(__('My Quizzes')); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="py-6">
        <?php echo $__env->make('user.progress.partials.navigator', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($sessions->count() > 0): ?>
            <div class="overflow-hidden bg-white border border-gray-100 shadow-sm rounded-xl">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">Quiz Name</th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">Completed On</th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">Score</th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-left text-gray-500 uppercase">Status</th>
                                <th scope="col" class="px-6 py-3 text-xs font-bold tracking-wider text-right text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="transition hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900"><?php echo e($session->quiz->title); ?></div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                        <?php echo e($session->completed_at ? \Carbon\Carbon::parse($session->completed_at)->format('d M, Y') : '-'); ?>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900"><?php echo e($session->results_percentage ?? 0); ?>%</div>
                                        <div class="text-xs text-gray-500"><?php echo e($session->total_score); ?>/<?php echo e($session->total_marks); ?> Pts</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php if(strtolower($session->status) == 'passed' || $session->results_pass_status == 'Pass'): ?>
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Passed</span>
                                        <?php else: ?>
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">Failed</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="<?php echo e(route('quiz_results', ['quiz' => $session->quiz->slug, 'session' => $session->id])); ?>" class="font-semibold text-blue-600 hover:text-blue-900">
                                            View Result
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                    <?php echo e($sessions->links()); ?>

                </div>
            </div>
        <?php else: ?>
            <div class="p-12 text-center bg-white border border-gray-300 border-dashed rounded-xl">
                <p class="text-gray-500"><?php echo e(__('No completed quizzes found.')); ?></p>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Digi_Laravel_Prrojects\Exam-Backup-Update\resources\views/user/progress/quizzes.blade.php ENDPATH**/ ?>