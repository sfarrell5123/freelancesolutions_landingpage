<?php $pd = $config['paradigm'] ?? []; ?>
<section id="paradigm" class="py-20 bg-gray-800">
  <div class="container mx-auto px-6">
    <div class="max-w-5xl mx-auto">
      <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-10"><?= htmlspecialchars($pd['title'] ?? 'From talk to action') ?></h2>
      <div class="grid md:grid-cols-2 gap-8">
        <div class="glass-card p-8 rounded-2xl reveal">
          <h3 class="text-2xl font-bold mb-2"><?= htmlspecialchars($pd['before']['heading'] ?? 'Before') ?></h3>
          <p class="text-gray-300"><?= htmlspecialchars($pd['before']['copy'] ?? '') ?></p>
        </div>
        <div class="glass-card p-8 rounded-2xl reveal">
          <h3 class="text-2xl font-bold mb-2"><?= htmlspecialchars($pd['after']['heading'] ?? 'After') ?></h3>
          <p class="text-gray-300"><?= htmlspecialchars($pd['after']['copy'] ?? '') ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

