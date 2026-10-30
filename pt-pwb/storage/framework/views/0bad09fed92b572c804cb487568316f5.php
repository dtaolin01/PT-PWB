<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Putra Wijaya Berjaya'); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('css/pwb-navbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pwb-footer.css')); ?>?v=<?php echo e(filemtime(public_path('css/pwb-footer.css'))); ?>">

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<script src="<?php echo e(asset('js/pwb-navbar.js')); ?>?v=<?php echo e(filemtime(public_path('js/pwb-navbar.js'))); ?>" defer></script>
<body id="top" class="<?php echo $__env->yieldContent('body_class'); ?>">
<?php echo $__env->make('partials.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main>
    <?php echo $__env->yieldContent('content'); ?>
</main>

<?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<script src="<?php echo e(asset('js/pwb-navbar.js')); ?>?v=<?php echo e(filemtime(public_path('js/pwb-navbar.js'))); ?>" defer></script>
</body>
</html>
<?php /**PATH C:\PT-PWB\pt-pwb\resources\views/layouts/app.blade.php ENDPATH**/ ?>