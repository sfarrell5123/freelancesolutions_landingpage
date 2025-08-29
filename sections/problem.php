<?php $p = $config['problem'] ?? []; ?>
<section id="problem" class="py-20 bg-gray-800">
  <div class="container mx-auto px-6">
    <div class="max-w-4xl mx-auto text-center">
      <h2 class="text-4xl md:text-5xl font-extrabold mb-6"><?= $p['title'] ?? '' ?></h2>
      <p class="text-xl text-gray-300 leading-relaxed reveal"><?= htmlspecialchars($p['copy'] ?? '') ?></p>
    </div>
  </div>
</section>

