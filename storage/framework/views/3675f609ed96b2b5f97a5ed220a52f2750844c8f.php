<div class="bg-white rounded p-6 shadow">
    <h4 class="pb-4 text-sm font-semibold uppercase text-gray-800">
        <?php echo e(__('Quick Links')); ?>

    </h4>

    <div class="grid grid-cols-1 sm:grid-cols-2 flex justify-between items-center">

        
        <ul>
            <li class="mb-2">
                <a class="qt-link-success" href="<?php echo e(route('quizzes.index')); ?>">
                    <?php echo e(__('New Quiz Schedule')); ?>

                </a>
            </li>

            <li class="mb-2">
                <a class="qt-link-success" href="<?php echo e(route('quizzes.create')); ?>">
                    <?php echo e(__('Create New Quiz')); ?>

                </a>
            </li>

            <li class="mb-2">
                <a class="qt-link-success" href="<?php echo e(route('practice-sets.create')); ?>">
                    <?php echo e(__('Create Practice Set')); ?>

                </a>
            </li>

            <li class="mb-2">
                <a class="qt-link-success" href="<?php echo e(route('quizzes.index')); ?>">
                    <?php echo e(__('View Quizzes')); ?>

                </a>
            </li>

            <li class="mb-2">
                <a class="qt-link-success" href="<?php echo e(route('practice-sets.index')); ?>">
                    <?php echo e(__('View Practice Sets')); ?>

                </a>
            </li>
        </ul>

        
        <ul>

            <li class="mb-2">
                <a class="qt-link-success" href="<?php echo e(route('questions.index')); ?>">
                    <?php echo e(__('Create New Question')); ?>

                </a>
            </li>

            <li class="mb-2">
                <a class="qt-link-success" href="<?php echo e(route('initiate_import_questions')); ?>">
                    <?php echo e(__('Import Questions')); ?>

                </a>
            </li>

            <li class="mb-2">
                <a class="qt-link-success" href="<?php echo e(route('comprehensions.index')); ?>">
                    <?php echo e(__('Create New Comprehension')); ?>

                </a>
            </li>

            <li class="mb-2">
                <a class="qt-link-success" href="<?php echo e(route('skills.index')); ?>">
                    <?php echo e(__('Create New Skill')); ?>

                </a>
            </li>

            <li class="mb-2">
                <a class="qt-link-success" href="<?php echo e(route('topics.index')); ?>">
                    <?php echo e(__('Create New Topic')); ?>

                </a>
            </li>

            <li class="mb-2">
                <a class="qt-link-success" href="<?php echo e(route('topics-ref')); ?>">
                    <svg class="w-4 h-4 mr-1 inline-block align-text-top"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <?php echo e(__('Topics Reference')); ?>

                </a>
            </li>

            <li>hello</li>
        </ul>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\exam_babu_new\resources\views/components/widgets/admin-quick-links.blade.php ENDPATH**/ ?>