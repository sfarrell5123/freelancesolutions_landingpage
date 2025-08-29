<?php $c = $config['concept'] ?? []; $cards = $c['cards'] ?? []; ?>
<section id="concept" class="py-20 bg-gray-900">
  <div class="container mx-auto px-6">
    <div class="max-w-5xl mx-auto">
      <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-10"><?= $c['title'] ?? '' ?></h2>
      <?php if ($cards): ?>
      <div class="grid md:grid-cols-3 gap-8">
        <?php foreach ($cards as $card): ?>
          <div class="glass-card p-8 rounded-2xl reveal">
            <div class="text-5xl mb-4"><?= htmlspecialchars($card['icon']) ?></div>
            <h3 class="text-xl font-bold mb-1"><?= htmlspecialchars($card['title']) ?></h3>
            <p class="text-gray-400 leading-relaxed"><?= htmlspecialchars($card['copy']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

