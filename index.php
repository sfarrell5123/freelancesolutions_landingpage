<?php
$config = require __DIR__ . '/config.php';
require __DIR__ . '/lib/components.php';
include __DIR__ . '/partials/head.php';

render_hero($config['brand'], $config['hero']);

foreach ($config['sections'] as $sec) {
  render_section($sec);
}

include __DIR__ . '/partials/footer.php';
