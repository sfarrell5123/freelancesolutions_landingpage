<?php $brand = $config['brand'] ?? []; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($brand['name'] ?? ''); ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/brand.css" />
  <script defer src="assets/script.js"></script>
</head>
<body class="bg-gray-900 text-white overflow-x-hidden">
