<?php $g = $config['gallery'] ?? []; $cards = $g['cards'] ?? []; ?>
<section id="gallery" class="py-20 bg-gray-900">
  <div class="container mx-auto px-6">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-10"><?= htmlspecialchars($g['title'] ?? 'Gallery') ?></h2>
      <div class="grid md:grid-cols-4 gap-6">
        <?php foreach ($cards as $c): ?>
        <div class="glass-card rounded-2xl overflow-hidden reveal">
          <img src="<?= htmlspecialchars($c['img']) ?>" alt="<?= htmlspecialchars($c['title']) ?>" class="w-full h-40 object-cover" />
          <div class="p-4">
            <div class="font-bold mb-1"><?= htmlspecialchars($c['title']) ?></div>
            <div class="text-gray-400 text-sm"><?= htmlspecialchars($c['copy']) ?></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

