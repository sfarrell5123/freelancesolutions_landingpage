<?php $footer = $config['footer'] ?? []; ?>
<footer class="py-12 bg-gray-900 border-t border-gray-800">
  <div class="container mx-auto px-6 text-center">
    <p class="text-2xl font-bold gradient-text mb-4"><?= htmlspecialchars($config['brand']['name'] ?? 'FreelanceSolutions') ?></p>
    <p class="text-gray-400 mb-4"><?= htmlspecialchars($footer['tagline'] ?? 'WordPress Jobs Philippines — community-powered support for builders.') ?></p>
    <p class="text-gray-600 text-sm">© <?= date('Y') ?> <?= htmlspecialchars($config['brand']['name'] ?? 'FreelanceSolutions') ?>. All rights reserved.</p>
  </div>
</footer>
</body>
</html>

