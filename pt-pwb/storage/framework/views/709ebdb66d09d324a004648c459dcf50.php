<?php $__env->startSection('title', 'Tracking | Putra Wijaya Berjaya'); ?>

<?php $__env->startPush('styles'); ?>
<?php if($shipment): ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css">
<?php endif; ?>
<link rel="stylesheet" href="<?php echo e(asset('css/pwb-tracking-page.css')); ?>?v=<?php echo e(filemtime(public_path('css/pwb-tracking-page.css'))); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


<section class="pwb-trk-hero">
    <img src="<?php echo e(asset('images/tracking-bg.jpg')); ?>" alt="" class="pwb-trk-hero-img">

    <div class="pwb-trk-hero-content">
        <div class="pwb-trk-tag">
            <span class="pwb-trk-tag-line"></span>
            <span>Tracking Pengiriman</span>
        </div>

        <h1 class="pwb-trk-hero-title">
            <span>Pantau Pengiriman Anda</span>
            <span>Secara Real-Time</span>
        </h1>

        <p class="pwb-trk-hero-text">
            Cek status pengiriman material konstruksi dan semen Anda dengan mudah dan cepat melalui sistem tracking kami.
        </p>
    </div>
</section>


<section id="lacak" class="pwb-trk">
    <div class="pwb-trk-inner">

        <form class="pwb-trk-search" action="<?php echo e(route('tracking')); ?>#lacak" method="GET">
            <label class="pwb-trk-field">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="10.5" cy="10.5" r="7"/><path d="M16 16l5 5"/></svg>
                <input type="text" name="resi" value="<?php echo e($resi); ?>" placeholder="Masukkan nomer resi / nomer pelanggan" autocomplete="off" required>
            </label>

            <button type="submit" class="pwb-trk-btn">
                Lacak
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 12h18M15 6l6 6-6 6"/></svg>
            </button>
        </form>

        <?php if($notFound): ?>
        <p class="pwb-trk-error">
            Nomor resi <strong><?php echo e($resi); ?></strong> tidak ditemukan. Periksa kembali nomor resi Anda atau hubungi tim kami.
        </p>
        <?php endif; ?>

        <?php if($shipment): ?>
        <div class="pwb-trk-card">

            
            <div class="pwb-trk-head">
                <div class="pwb-trk-head-left">
                    <span class="pwb-trk-resi-label">No Resi</span>
                    <h2 class="pwb-trk-resi"><?php echo e($shipment['resi']); ?></h2>
                </div>

                <div class="pwb-trk-head-right">
                            <span class="pwb-trk-badge pwb-trk-badge--<?php echo e($shipment['status_color'] ?? 'green'); ?>">
                                <?php echo e($shipment['status_label'] ?? ''); ?>

                            </span>

                    <?php if(!empty($shipment['eta_text'])): ?>
                    <div class="pwb-trk-eta">
                        <span class="pwb-trk-eta-label">Estimasi Tiba</span>
                        <strong class="pwb-trk-eta-date"><?php echo e($shipment['eta_text']); ?></strong>
                        <?php if(!empty($shipment['eta_note'])): ?>
                        <span class="pwb-trk-eta-note">(<?php echo e($shipment['eta_note']); ?>)</span>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            
            <ol class="pwb-trk-steps">
                <?php $__currentLoopData = $shipment['steps'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $next = ($shipment['steps'][$i + 1] ?? null);
                $classes = trim(
                (!empty($step['done']) ? 'is-done ' : '') .
                (!empty($next['done']) ? 'is-linked' : '')
                );
                ?>
                <li class="pwb-trk-step <?php echo e($classes); ?>">
                                <span class="pwb-trk-node">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 12.5l5 5L20 6.5"/></svg>
                                </span>
                    <div class="pwb-trk-step-text">
                        <strong class="pwb-trk-step-label"><?php echo e($step['label']); ?></strong>
                        <span class="pwb-trk-step-date"><?php echo e($step['date'] ?? ''); ?></span>
                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>

            
            <?php if(!empty($shipment['details'])): ?>
            <h3 class="pwb-trk-section-title">Detail Pengiriman</h3>
            <div class="pwb-trk-detail-grid">
                <?php $__currentLoopData = $shipment['details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="pwb-trk-detail-col">
                    <?php $__currentLoopData = $column; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="pwb-trk-detail-row">
                        <span class="pwb-trk-detail-label"><?php echo e($row[0]); ?></span>
                        <span class="pwb-trk-detail-value"><?php echo e($row[1]); ?></span>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

            
            <h3 class="pwb-trk-section-title pwb-trk-section-title--map">Lokasi Terakhir</h3>
            <div id="pwb-trk-map" class="pwb-trk-map" data-map="<?php echo e(json_encode($shipment['map'] ?? [])); ?>"></div>

            
            <div class="pwb-trk-info">
                        <span class="pwb-trk-info-icon">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="12" fill="currentColor"/>
                                <circle cx="12" cy="6.6" r="1.7" fill="#ffffff"/>
                                <rect x="10.3" y="9.8" width="3.4" height="8" rx="1" fill="#ffffff"/>
                            </svg>
                        </span>
                <div>
                    <h4 class="pwb-trk-info-title">Informasi</h4>
                    <p class="pwb-trk-info-text">
                        Posisi Kendaraan diperbarui setiap 2 jam. Jika ada kendala, silahkan hubungi tim kami melalui
                        <a href="https://wa.me/<?php echo e($whatsapp); ?>" target="_blank" rel="noopener">WhatsApp</a>.
                    </p>
                </div>
            </div>

        </div>
        <?php endif; ?>

    </div>
</section>

<?php if($shipment): ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
<script src="<?php echo e(asset('js/pwb-tracking-map.js')); ?>?v=<?php echo e(filemtime(public_path('js/pwb-tracking-map.js'))); ?>"></script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\PT-PWB\pt-pwb\resources\views/tracking.blade.php ENDPATH**/ ?>