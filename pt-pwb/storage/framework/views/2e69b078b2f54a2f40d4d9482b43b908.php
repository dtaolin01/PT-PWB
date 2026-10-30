<?php $__env->startSection('title', 'Contact | Putra Wijaya Berjaya'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pwb-contact-page.css')); ?>?v=<?php echo e(filemtime(public_path('css/pwb-contact-page.css'))); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="pwb-contact-page">
    <div class="pwb-contact-page-inner">
        <h1 class="pwb-contact-page-title">Contacts</h1>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\PT-PWB\pt-pwb\resources\views/contact.blade.php ENDPATH**/ ?>