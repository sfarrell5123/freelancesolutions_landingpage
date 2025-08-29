<?php $e = $config['engine'] ?? []; $pipe = $e['pipeline'] ?? []; ?>
<section id="engine" class="py-20 bg-gray-800">
  <div class="container mx-auto px-6">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-10"><?= $e['title'] ?? '' ?></h2>

      <?php if ($pipe): ?>
      <div class="glass-card p-6 md:p-8 rounded-2xl reveal">
        <div class="flex flex-wrap items-center justify-center gap-3 md:gap-5 text-lg md:text-xl font-semibold">
          <?php for($i=0; $i<count($pipe); $i++): ?>
            <span class="gradient-text"><?= htmlspecialchars($pipe[$i]) ?></span>
            <?php if ($i < count($pipe)-1): ?><span class="text-gray-500">→</span><?php endif; ?>
          <?php endfor; ?>
        </div>
        <div class="mt-4 text-center text-gray-400"><span class="font-mono text-sm">Transparent, simple, direct</span></div>
      </div>
      <?php endif; ?>

      <div class="grid md:grid-cols-2 gap-8 mt-10">
        <div class="process-card p-8 rounded-2xl reveal">
          <h3 class="text-2xl font-bold mb-2"><?= htmlspecialchars($e['left']['heading'] ?? 'Genesis') ?></h3>
          <p class="text-gray-300">
            <?= htmlspecialchars($e['left']['copy'] ?? '') ?>
          </p>
        </div>
        <div class="process-card p-8 rounded-2xl reveal">
          <h3 class="text-2xl font-bold mb-2"><?= htmlspecialchars($e['right']['heading'] ?? 'Daily Reality') ?></h3>
          <p class="text-gray-300">
            <?= htmlspecialchars($e['right']['copy'] ?? '') ?>
          </p>
        </div>
      </div>

      <div class="mt-10 grid grid-cols-3 gap-4 max-w-3xl mx-auto">
        <?php foreach (($e['frequency'] ?? []) as $f): ?>
          <div class="metric-card rounded-lg p-4 text-center reveal">
            <span class="text-sm text-gray-300">
              <?= htmlspecialchars($f) ?>
            </span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

