<?php
$kontak = [
['icon' => 'IconWhatsapp.png', 'text' => '+62 852 - 1881 - 5858', 'href' => 'https://wa.me/6285218815858?text=Halo%20PT%20PWB%2C%20saya%20mau%20tanya%20tarif%20pengiriman%20%5BSemen%20Conch%20%2F%20Muatan%20Lain%5D.%0A-%20Jenis%20Muatan%3A%20%0A-%20Jumlah%2FBerat%20(Ton)%3A%20%0A-%20Rute%20(Dari%20-%3E%20Ke)%3A', 'external' => true],
['icon' => 'IconGmail.png',    'text' => 'putrawijaya.berjaya@gmail.com', 'href' => route('contact')],
['icon' => 'IconLocation.png', 'text' => 'Simpang Pasir Samarinda, Kalimantan Timur', 'href' => 'https://maps.app.goo.gl/pNcsgsi19svf36U46?g_st=ic', 'external' => true],
];
?>

<section id="hubungi" class="pwb-hk">
    <div class="pwb-hk-inner">

        <div class="pwb-hk-photo">
            <img src="<?php echo e(asset('images/contact.png')); ?>" alt="Tim PWB">
        </div>

        <div class="pwb-hk-text">
            <div class="pwb-hk-tag">
                <span class="pwb-hk-tag-line"></span>
                <span>Hubungi Kami</span>
            </div>

            <h2 class="pwb-hk-title">Siap Menjadi Mitra Logistik Anda</h2>

            <p class="pwb-hk-desc">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi porttitor urna id interdum finibus. Vivamus ultrices sodales sapien, eu iaculis lectus malesuada a. Morbi rutrum laoreet tempus. Nulla nec risus tortor. Nunc sit amet ultricies augue.
            </p>
        </div>

        <div class="pwb-hk-list">
            <?php $__currentLoopData = $kontak; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($item['href']); ?>" class="pwb-hk-item"
               <?php if(!empty($item['external'])): ?> target="_blank" rel="noopener" <?php endif; ?>>
                    <span class="pwb-hk-icon">
                        <?php if(file_exists(public_path('images/icons/' . $item['icon']))): ?>
                            <img src="<?php echo e(asset('images/icons/' . $item['icon'])); ?>" alt="">
                        <?php endif; ?>
                    </span>
                <span class="pwb-hk-label"><?php echo e($item['text']); ?></span>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>   

    </div>       
</section>
<?php /**PATH C:\PT-PWB\pt-pwb\resources\views/sections/hubungi-kami.blade.php ENDPATH**/ ?>