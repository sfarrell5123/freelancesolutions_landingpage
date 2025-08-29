<?php $fork = $config['fork'] ?? []; ?>
<section id="fork" class="py-20 bg-gray-800">
  <div class="container mx-auto px-6">
    <div class="max-w-5xl mx-auto text-center">
      <h2 class="text-4xl md:text-5xl font-extrabold mb-10"><?= htmlspecialchars($fork['title'] ?? 'Choose your perspective') ?></h2>
      <div class="grid md:grid-cols-2 gap-6">
        <a href="<?= htmlspecialchars($fork['left']['target'] ?? '#business') ?>" class="glass-card p-10 rounded-2xl block reveal">
          <div class="text-3xl mb-2">💼</div>
          <div class="text-xl font-bold"><?= htmlspecialchars($fork['left']['label'] ?? 'Business / Supporter') ?></div>
          <div class="text-gray-400 mt-1">Why your purchase matters</div>
        </a>
        <a href="<?= htmlspecialchars($fork['right']['target'] ?? '#technical') ?>" class="glass-card p-10 rounded-2xl block reveal">
          <div class="text-3xl mb-2">🛠️</div>
          <div class="text-xl font-bold"><?= htmlspecialchars($fork['right']['label'] ?? 'Technical / Builder') ?></div>
          <div class="text-gray-400 mt-1">How we route funds</div>
        </a>
      </div>
    </div>
  </div>
</section>

