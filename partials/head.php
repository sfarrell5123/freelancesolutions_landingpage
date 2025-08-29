<?php
$brand = $config['brand'] ?? [];
$title = ($brand['site_title'] ?? 'FreelanceSolutions') . ' — WordPress Jobs Philippines';
$bodyTheme = 'theme-' . ($brand['theme'] ?? 'default');
$description = $brand['description'] ?? 'Buy the shirt, feed the builders. 100% of profits support Filipino web devs.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($description) ?>" />

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          container: { center: true, padding: '1.5rem' },
          fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui', 'Segoe UI', 'Roboto'] },
        }
      }
    }
  </script>
  <!-- Inter font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Brand styles and site JS -->
  <link rel="stylesheet" href="assets/css/brand.css" />
  <script defer src="assets/js/main.js"></script>
</head>
<body class="bg-gray-900 text-white overflow-x-hidden <?= htmlspecialchars($bodyTheme) ?>">

