<?php
$commitments = [
['icon' => 'commitment-1.png', 'text' => 'Lorem ipsum dolor sit amet, consectetur'],
['icon' => 'commitment-2.png', 'text' => 'Lorem ipsum dolor sit amet, consectetur'],
['icon' => 'commitment-3.png', 'text' => 'Lorem ipsum dolor sit amet, consectetur'],
['icon' => 'commitment-4.png', 'text' => 'Lorem ipsum dolor sit amet, consectetur'],
];
?>

<section id="komitmen" class="pwb-commit">
    <img src="<?php echo e(asset('images/commitment-bg.jpg')); ?>" alt="" class="pwb-commit-bg">
    <div class="pwb-commit-inner">

        <div class="pwb-commit-label">
            <span class="pwb-commit-line"></span>
            <span>Layanan Kami</span>
        </div>

        <h2 class="pwb-commit-title">Komitmen Kami untuk Anda</h2>

        <div class="pwb-commit-grid">
            <?php $__currentLoopData = $commitments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="pwb-commit-item">
                <div class="pwb-commit-icon">
                    <?php if(file_exists(public_path('images/icons/' . $item['icon']))): ?>
                    <img src="<?php echo e(asset('images/icons/' . $item['icon'])); ?>" alt="">
                    <?php endif; ?>
                </div>
                <p class="pwb-commit-text"><?php echo e($item['text']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</section>
<?php /**PATH C:\PT-PWB\pt-pwb\resources\views/sections/commitment.blade.php ENDPATH**/ ?>