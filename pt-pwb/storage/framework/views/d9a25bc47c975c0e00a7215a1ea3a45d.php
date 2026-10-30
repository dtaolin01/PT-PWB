<nav class="pwb-navbar">
    <a href="<?php echo e(url('/')); ?>" class="pwb-brand">
        <img src="<?php echo e(asset('images/pwb-logo.png')); ?>" alt="Logo PWB" class="pwb-logo">
        <div class="pwb-text">
            <span class="pwb-title">Putra Wijaya Berjaya</span>
            <span class="pwb-subtitle">Logistics &amp; Distribution</span>
        </div>
    </a>

    <input type="checkbox" id="pwb-toggle" class="pwb-toggle">
    <label for="pwb-toggle" class="pwb-burger" aria-label="Menu">
        <span></span><span></span><span></span>
    </label>

    <ul class="pwb-menu">
        <li><a href="<?php echo e(route('home')); ?>#top" data-section="top" class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Home</a></li>
        <li><a href="<?php echo e(route('home')); ?>#tentang" data-section="tentang">About</a></li>
        <li><a href="<?php echo e(route('home')); ?>#layanan" data-section="layanan">Services</a></li>
        <li><a href="<?php echo e(route('contact')); ?>" class="<?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>">Contacts</a></li>
        <li><a href="<?php echo e(route('tracking')); ?>" class="<?php echo e(request()->routeIs('tracking') ? 'active' : ''); ?>">Tracking</a></li>
    </ul>
</nav>


<?php /**PATH C:\PT-PWB\pt-pwb\resources\views/partials/navbar.blade.php ENDPATH**/ ?>