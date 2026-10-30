

<?php $__env->startSection('title', 'Putra Wijaya Berjaya | Logistics & Distribution'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/services.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <img src="<?php echo e(asset('images/services_pwb(1).png')); ?>" alt="" class="services-image">

    <div class="services-hero-content">

        <div class="services-breadcrumb">
            <span class="services-breadcrumb-line"></span>
            <span>Armada Kami</span>
        </div>

        <h1 class="services-hero-title">
            <span class="services-title-blue">Armada Modern,</span>
            <span class="services-title-blue2">Siap Melayani</span>
        </h1>

        <p class="services-hero-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        </p>

        <div class="services-hero-actions">
            <a href="#" class="services-btn services-btn-red">
                Hubungi Kami
                <svg class="services-arrow" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.8"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12h18M15 6l6 6-6 6"/>
                </svg>
            </a>
        </div>

    </div>

    <div class="container">
      <div class="features">

        <article class="feature-card">
          <div class="feature-icon"><!-- <img src="icon-1.svg" alt=""> --></div>
          <h3>Lorem Ipsum</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus.</p>
        </article>

        <article class="feature-card">
          <div class="feature-icon"></div>
          <h3>Lorem Ipsum</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus.</p>
        </article>

        <article class="feature-card">
          <div class="feature-icon"></div>
          <h3>Lorem Ipsum</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus.</p>
        </article>

        <article class="feature-card">
          <div class="feature-icon"></div>
          <h3>Lorem Ipsum</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus.</p>
        </article>

      </div>
    </div>


     <div class="container2">
      <div class="eyebrow">Jenis Armada Kami</div>
      <h2 class="section-title">Kendaraan untuk setiap kebutuhan</h2>

      <div class="fleet">

        <article class="fleet-card">
          <div class="fleet-thumb"><!-- <img src="truk-1.jpg" alt="Nama truk"> --></div>
          <h3>Truk Place Holder Name</h3>
          <dl class="details">
            <dt>Detail 1 :</dt><dd>Lorem Ipsum</dd>
            <dt>Detail 2 :</dt><dd>Lorem Ipsum</dd>
            <dt>Detail 3 :</dt><dd>Lorem Ipsum</dd>
          </dl>
        </article>

        <article class="fleet-card">
          <div class="fleet-thumb"></div>
          <h3>Truk Place Holder Name</h3>
          <dl class="details">
            <dt>Detail 1 :</dt><dd>Lorem Ipsum</dd>
            <dt>Detail 2 :</dt><dd>Lorem Ipsum</dd>
            <dt>Detail 3 :</dt><dd>Lorem Ipsum</dd>
          </dl>
        </article>

        <article class="fleet-card">
          <div class="fleet-thumb"></div>
          <h3>Truk Place Holder Name</h3>
          <dl class="details">
            <dt>Detail 1 :</dt><dd>Lorem Ipsum</dd>
            <dt>Detail 2 :</dt><dd>Lorem Ipsum</dd>
            <dt>Detail 3 :</dt><dd>Lorem Ipsum</dd>
          </dl>
        </article>

      </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\PT-PWB\pt-pwb\resources\views/services.blade.php ENDPATH**/ ?>