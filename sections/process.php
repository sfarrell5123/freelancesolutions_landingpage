<?php $proc = $config['process'] ?? []; $steps = $proc['steps'] ?? []; ?>
<section id="process" class="py-20 bg-gray-900">
  <div class="container mx-auto px-6">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-12"><?= $proc['title'] ?? '' ?></h2>
      <div class="grid md:grid-cols-5 gap-5">
        <?php foreach ($steps as $s): ?>
          <div class="process-card p-6 rounded-2xl reveal">
            <div class="text-sm text-gray-400 mb-2">Step <?= (int)($s['n'] ?? 0) ?></div>
            <h3 class="text-xl font-bold mb-2"><?= htmlspecialchars($s['title']) ?></h3>
            <p class="text-gray-300 text-sm leading-relaxed"><?= htmlspecialchars($s['copy']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

