<?php
// FreelanceSolutions Landing Page — index.php
// Variants: default, tropical, contrast via ?v=

// Load config
$variant = isset($_GET['v']) ? preg_replace('/[^a-z0-9_-]/i', '', $_GET['v']) : 'default';
$configPath = __DIR__ . "/config/{$variant}.php";
if (!file_exists($configPath)) {
  $configPath = __DIR__ . "/config/default.php";
}
$config = require $configPath;

// Make config available to includes
require __DIR__ . '/partials/head.php';

// Sections flow — the story arc
include __DIR__ . '/sections/hero.php';
include __DIR__ . '/sections/problem.php';
include __DIR__ . '/sections/concept.php';
include __DIR__ . '/sections/engine.php';
include __DIR__ . '/sections/process.php';
include __DIR__ . '/sections/fork.php';
include __DIR__ . '/sections/media_business.php';
include __DIR__ . '/sections/media_technical.php';
include __DIR__ . '/sections/features.php';
include __DIR__ . '/sections/paradigm_shift.php';
include __DIR__ . '/sections/gallery.php';
include __DIR__ . '/sections/final_cta.php';

require __DIR__ . '/partials/footer.php';
?>

