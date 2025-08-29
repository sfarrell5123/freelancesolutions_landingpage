<?php $footer = $config['footer'] ?? []; ?>
<footer class="py-12 bg-gray-900 border-t border-gray-800">
  <div class="container mx-auto px-6 text-center">
    <p class="text-2xl font-bold gradient-text mb-4"><?= htmlspecialchars($config['brand']['name'] ?? ''); ?></p>
    <p class="text-gray-400"><?= htmlspecialchars($footer['copy'] ?? ''); ?></p>
  </div>
</footer>
</body>
</html>
