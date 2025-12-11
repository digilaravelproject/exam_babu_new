<!DOCTYPE html>
<html dir="ltr" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <title><?php echo $__env->yieldContent('title', 'Exam Babu'); ?></title>
    <meta name="description"
          content="<?php echo $__env->yieldContent('meta_description', '#dharmaday #mpsc #Bhumiabhilekh #thane #pune #nasik #mocktests #GMC #mahaurja #mpscrajyaseva'); ?>">

    
    <link rel="icon" href="<?php echo e(asset('storage/site/favicon.jpg')); ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">

    <!-- Styles (same as your original) -->
    <link rel="stylesheet" href="<?php echo e(asset('vendor/primeicons/primeicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/nprogress/nprogress.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/katex/katex.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    <style>
        :root {
            /* Custom Theme Configuration */
            --custom-font: "Inter";
            --primary-color: #22435d;
            --secondary-color: #eb8f28;
        }
    </style>

    <!-- Ziggy + route() JS (paste your existing script block here if still needed) -->
    

    <script>
        window.CKEditorURL = "<?php echo e(asset('vendor/ckeditor/ckeditor.js')); ?>";
    </script>

    <script src="<?php echo e(asset('vendor/katex/katex.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/katex/contrib/auto-render.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('js/manifest.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/vendor-vue.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/vendor.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">

    
    <?php echo $__env->yieldContent('content'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\exam_babu_new\resources\views/layouts/admin.blade.php ENDPATH**/ ?>