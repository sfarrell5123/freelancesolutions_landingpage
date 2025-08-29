<?php $hero = $config['hero'] ?? []; $shop = $config['links']['shop'] ?? '#'; ?>
<section class="hero-bg min-h-[100svh] flex items-center justify-center relative">
  <div class="container mx-auto px-6 py-20 relative z-10">
    <div class="text-center max-w-3xl mx-auto">
      <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
        <span class="gradient-text"><?= htmlspecialchars($hero['title'] ?? '') ?></span>
      </h1>
      <p class="text-2xl text-gray-100 mb-3"><?= htmlspecialchars($hero['subtitle'] ?? '') ?></p>
      <p class="text-xl md:text-2xl text-gray-300 mb-10"><?= htmlspecialchars($hero['lede'] ?? '') ?></p>
      <a href="<?= htmlspecialchars($shop) ?>" class="cta-button inline-block text-white font-bold py-4 px-8 md:py-5 md:px-12 rounded-full text-lg shadow-2xl">We need your help!</a>

      <?php if (!empty($hero['metrics'])): ?>
      <div class="mt-12 grid grid-cols-3 gap-6 max-w-xl mx-auto">
        <?php foreach ($hero['metrics'] as $m): ?>
          <div class="metric-card p-4 rounded-lg text-center reveal">
            <div class="text-2xl md:text-3xl font-bold gradient-text"><?= htmlspecialchars($m['value']) ?></div>
            <div class="text-xs md:text-sm text-gray-400"><?= htmlspecialchars($m['label']) ?></div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 scroll-indicator">
      <svg class="w-6 h-6 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
      </svg>
    </div>
  </div>
</section>

