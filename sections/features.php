<?php $f = $config['features'] ?? []; $items = $f['items'] ?? []; ?>
<section id="features" class="py-20 bg-gray-900">
  <div class="container mx-auto px-6">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-10"><?= htmlspecialchars($f['title'] ?? 'Features') ?></h2>
      <div class="grid md:grid-cols-3 gap-8">
        <?php foreach ($items as $it): ?>
        <div class="glass-card p-8 rounded-2xl reveal">
          <div class="text-4xl mb-3"><?= htmlspecialchars($it['icon']) ?></div>
          <h3 class="text-xl font-bold mb-2"><?= htmlspecialchars($it['title']) ?></h3>
          <p class="text-gray-400 leading-relaxed"><?= htmlspecialchars($it['copy']) ?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

