<?php $__env->startSection('title', 'Putra Wijaya Berjaya | Logistics & Distribution'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pwb-landing.css')); ?>?v=<?php echo e(filemtime(public_path('css/pwb-landing.css'))); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/pwb-about.css')); ?>?v=<?php echo e(filemtime(public_path('css/pwb-about.css'))); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/pwb-services.css')); ?>?v=<?php echo e(filemtime(public_path('css/pwb-services.css'))); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/pwb-fleet.css')); ?>?v=<?php echo e(filemtime(public_path('css/pwb-fleet.css'))); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/pwb-commitment.css')); ?>?v=<?php echo e(filemtime(public_path('css/pwb-commitment.css'))); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/pwb-hubungi.css')); ?>?v=<?php echo e(filemtime(public_path('css/pwb-hubungi.css'))); ?>">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<section class="pwb-banner">
    <img src="<?php echo e(asset('images/hero-bg.jpg')); ?>" alt="" class="pwb-banner-img">

    <div class="pwb-banner-content">

        <div class="pwb-breadcrumb">
            <span class="pwb-breadcrumb-line"></span>
            <span>Logistics</span>
            <span class="pwb-breadcrumb-slash">/</span>
            <span>Cement Transportation</span>
        </div>

        <h1 class="pwb-hero-title">
            <span class="line-white">Delivering Materials</span>
            <span class="line-yellow">For a Stronger Tomorrow</span>
        </h1>

        <p class="pwb-hero-text">
            PWB hadir sebagai mitra logistik terpercaya untuk pengiriman semen dan material konstruksi dengan layanan yang aman, tepat waktu dan profesional.
        </p>

        <div class="pwb-hero-actions">
            <a href="<?php echo e(route('contact')); ?>" class="pwb-btn pwb-btn-red">
                Hubungi Kami
                <svg class="pwb-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18M15 6l6 6-6 6"/></svg>
            </a>
            <a href="#tentang" class="pwb-btn pwb-btn-text">
                Pelajari Lebih Lanjut
                <svg class="pwb-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12h18M15 6l6 6-6 6"/></svg>
            </a>
        </div>

    </div>
</section>

<?php echo $__env->make('sections.about', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('sections.services', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('sections.fleet', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('sections.commitment', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('sections.hubungi-kami', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\PT-PWB\pt-pwb\resources\views/home.blade.php ENDPATH**/ ?>