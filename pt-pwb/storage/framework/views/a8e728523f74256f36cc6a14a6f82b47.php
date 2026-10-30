<?php
$fleet = [
['title' => 'Lorem Ipsum', 'desc' => 'Lorem ipsum dolor sit amet, consectetur', 'color' => 'blue'],
['title' => 'Lorem Ipsum', 'desc' => 'Lorem ipsum dolor sit amet, consectetur', 'color' => 'red'],
['title' => 'Lorem Ipsum', 'desc' => 'Lorem ipsum dolor sit amet, consectetur', 'color' => 'yellow'],
];
?>

<section id="armada" class="pwb-fleet">
    <div class="pwb-fleet-inner">

        
        <div class="pwb-fleet-photo">
            <img src="<?php echo e(asset('images/fleet.png')); ?>" alt="Armada PWB">
        </div>

        
        <div class="pwb-fleet-content">
            <div class="pwb-label">
                <span class="pwb-label-line"></span>
                <span>Armada Kami</span>
            </div>

            <h2 class="pwb-fleet-title">Armada Modern, Siap Melayani</h2>

            <p class="pwb-fleet-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus. Vivamus ultrices sodales sapien.
            </p>

            <div class="pwb-fleet-cards">
                <?php $__currentLoopData = $fleet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="pwb-fleet-card">
                    <div class="pwb-fleet-card-head">
                        <div class="pwb-fleet-icon pwb-fleet-icon--<?php echo e($item['color']); ?>">
                            <img src="<?php echo e(asset('images/icons/truck.png')); ?>" alt="">
                        </div>
                        <h3 class="pwb-fleet-card-title pwb-fleet-card-title--<?php echo e($item['color']); ?>"><?php echo e($item['title']); ?></h3>
                    </div>
                    <p class="pwb-fleet-card-text"><?php echo e($item['desc']); ?></p>
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
</section>
<?php /**PATH C:\PT-PWB\pt-pwb\resources\views/sections/fleet.blade.php ENDPATH**/ ?>