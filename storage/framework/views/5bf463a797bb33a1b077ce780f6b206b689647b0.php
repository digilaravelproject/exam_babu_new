<nav class="relative px-3 py-4 space-y-2">

    <div class="px-2 mb-6">
        <div class="p-3 bg-blue-800 border bg-opacity-40 rounded-xl border-blue-700/50 backdrop-blur-sm">
            <h4 class="mb-1 text-xs font-bold tracking-wider text-blue-100 uppercase">Current Syllabus</h4>
            <div class="flex items-center justify-between">
                <span class="pr-2 text-sm font-bold text-white truncate">
                    <?php echo e(request()->cookie('category_name') ?? __('No Syllabus Selected')); ?>

                </span>
                <a href="<?php echo e(route('change_syllabus')); ?>"
                    class="px-2 py-1 text-xs text-white transition bg-blue-600 rounded hover:bg-blue-500">
                    Change
                </a>
            </div>
        </div>
    </div>

    <?php
        $navLinks = [
            ['name' => 'Dashboard', 'route' => 'user_dashboard', 'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z'],
            ['name' => 'Add Exams', 'route' => 'add_exams', 'icon' => 'M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z'],
            ['name' => 'My Exams', 'route' => 'exam_dashboard', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
            ['name' => 'My Progress', 'route' => 'my_progress', 'icon' => 'M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z']
        ];
    ?>

    <?php $__currentLoopData = $navLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route($link['route'])); ?>" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 ease-in-out
               <?php echo e(request()->routeIs($link['route'])
            ? 'bg-blue-600 text-white shadow-lg shadow-blue-500/30'
            : 'text-blue-100 hover:bg-white/10 hover:text-white'); ?>">

            <svg class="mr-3 h-5 w-5 flex-shrink-0 <?php echo e(request()->routeIs($link['route']) ? 'text-white' : 'text-blue-300 group-hover:text-white'); ?>"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($link['icon']); ?>" />
            </svg>

            <?php echo e(__($link['name'])); ?>


            <?php if(request()->routeIs($link['route'])): ?>
                <span class="ml-auto w-1.5 h-1.5 bg-white rounded-full"></span>
            <?php endif; ?>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</nav>
<?php /**PATH C:\xampp\htdocs\Digi_Laravel_Prrojects\Exam-Backup-Update\resources\views/layouts/partials/sidebar.blade.php ENDPATH**/ ?>