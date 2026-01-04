<?php
$title = isset($title) ? $title : 'Page Title';
$subtitle = isset($subtitle) ? $subtitle : '';
$backgroundImage = isset($backgroundImage) ? $backgroundImage : '';
?>
<section class="relative h-96 flex items-center justify-center" style="background-image: url('<?php echo htmlspecialchars($backgroundImage); ?>'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative z-10 text-center text-white">
        <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-light mb-4"><?php echo htmlspecialchars($title); ?></h1>
        <?php if ($subtitle): ?>
            <p class="text-lg md:text-xl font-light"><?php echo htmlspecialchars($subtitle); ?></p>
        <?php endif; ?>
    </div>
</section>
