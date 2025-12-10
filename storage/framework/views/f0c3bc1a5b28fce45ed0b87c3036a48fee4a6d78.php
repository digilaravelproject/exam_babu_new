<?php $__env->startSection('header'); ?>
    <h1 class="text-2xl font-bold tracking-tight text-gray-800"><?php echo e(__('My Exams')); ?></h1>
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
                                <th class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase">Exam Name</th>
                                <th class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase">Completed</th>
                                <th class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase">Score</th>
                                <th class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-xs font-bold text-right text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900"><?php echo e($session->exam->title); ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        <?php echo e(\Carbon\Carbon::parse($session->completed_at)->format('d M, Y')); ?>

                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-bold text-gray-900"><?php echo e($session->percentage ?? 0); ?>%</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                                            <?php echo e(strtolower($session->status) == 'passed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                                            <?php echo e(ucfirst($session->status)); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-right">
                                        <a href="<?php echo e(route('exam_results', ['exam' => $session->exam->slug, 'session' => $session->id])); ?>" class="font-semibold text-blue-600 hover:text-blue-900">Results</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-gray-200"><?php echo e($sessions->links()); ?></div>
            </div>
        <?php else: ?>
            <div class="p-12 text-center text-gray-500 bg-white border border-gray-300 border-dashed rounded-xl">
                No completed exams found.
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Digi_Laravel_Prrojects\Exam-Backup-Update\resources\views/user/progress/exams.blade.php ENDPATH**/ ?>