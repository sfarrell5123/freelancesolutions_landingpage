<?php $cta = $config['final_cta'] ?? []; $shop = $config['links']['shop'] ?? '#'; ?>
<section id="cta" class="py-20" style="background: var(--brand-gradient);">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-4xl md:text-5xl font-extrabold mb-4 text-white"><?= htmlspecialchars($cta['title'] ?? 'Ready to help?') ?></h2>
      <p class="text-white/90 text-lg md:text-xl mb-8">
        <?= htmlspecialchars($cta['copy'] ?? '') ?>
      </p>
      <a href="<?= htmlspecialchars($shop) ?>" class="inline-block bg-black/60 hover:bg-black/70 text-white font-bold py-4 px-10 rounded-full shadow-2xl">Buy the Shirt</a>
      <div class="text-white/80 text-sm mt-4">100% of the profit goes directly to our hungry web devs. #feedcarl</div>
    </div>
  </div>
</section>

