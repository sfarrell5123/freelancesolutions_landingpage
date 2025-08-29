# Create the Tailwind PHP starter project structure and files.
import os, textwrap, json, pathlib, shutil

base = "/mnt/data/spinitup-starter"
paths = [
    base,
    f"{base}/assets",
    f"{base}/partials",
    f"{base}/lib",
    f"{base}/components"  # placeholder in case user wants to add new components
]

for p in paths:
    os.makedirs(p, exist_ok=True)

# config.php
config_php = """<?php
// ──────────────────────────────────────────────────────────────────────────────
// SpinItUp Tailwind Starter — PHP edition
// Centralised tokens + page content. Copy this file per project and tweak.
// ──────────────────────────────────────────────────────────────────────────────

return [
  // Brand tokens (also mirrored in CSS variables)
  'brand' => [
    'name' => 'SpinItUp',
    'gradient' => 'linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #fda085 100%)',
    'hero_bg' => 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
    'font' => 'Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Noto Sans, Ubuntu, Cantarell, Helvetica Neue, Arial, "Apple Color Emoji", "Segoe UI Emoji"',
  ],

  // Hero content
  'hero' => [
    'title' => 'SpinItUp',
    'subtitle' => 'Where Ideas Become Empires',
    'lede' => 'Turn sparks into systems. Launch fast, learn faster, compound forever.',
    'primary_cta' => ['label' => 'Start Your First Experiment 🚀', 'href' => '#signup'],
    'metrics' => [
      ['value' => '15 min', 'label' => 'Idea → Launch'],
      ['value' => '24/7',   'label' => 'Autonomous Growth'],
      ['value' => '∞',      'label' => 'Scaling Potential'],
    ],
  ],

  // Sections (swap, duplicate, or remove as needed)
  'sections' => [
    [
      'id' => 'problem',
      'bg' => 'bg-gray-800',
      'title' => 'The Tragedy of <span class=\"gradient-text\">Unrealised Potential</span>',
      'content_html' => '<p class=\"text-xl text-gray-300\">You have ideas. You lack infrastructure, time, and a compounding engine. This starter helps you ship the vibe quickly.</p>',
    ],
    [
      'id' => 'how-it-works',
      'bg' => 'bg-gray-900',
      'title' => 'The <span class=\"gradient-text\">Loop</span>',
      'content_html' => '
        <div class=\"glass-card p-8 rounded-2xl overflow-hidden\">
          <div class=\"flex flex-wrap items-center justify-center gap-4 text-lg md:text-xl font-semibold\">
            <span class=\"text-purple-400\">idea</span><span class=\"text-gray-500\">→</span>
            <span class=\"text-pink-400\">strategy</span><span class=\"text-gray-500\">→</span>
            <span class=\"text-indigo-400\">landing</span><span class=\"text-gray-500\">→</span>
            <span class=\"text-green-400\">content</span><span class=\"text-gray-500\">→</span>
            <span class=\"text-yellow-400\">conversations</span><span class=\"text-gray-500\">→</span>
            <span class=\"text-purple-400\">loop ∞</span>
          </div>
          <div class=\"mt-6 text-center text-gray-400\"><span class=\"font-mono text-sm\">Generating... 24/7/365</span></div>
        </div>
      ',
    ],
    [
      'id' => 'features',
      'bg' => 'bg-gray-900',
      'title' => 'Your <span class=\"gradient-text\">Command Centre</span>',
      'cards' => [
        ['icon' => '🌐', 'title' => 'Omnipresent Launch', 'copy' => 'Website, socials, content — all spinning up together'],
        ['icon' => '🧬', 'title' => 'Evolutionary AI', 'copy' => 'Adapts to market response, compounds results'],
        ['icon' => '🎮', 'title' => 'Whisper Control', 'copy' => 'Guide with hints; the system decides the how'],
        ['icon' => '🔄', 'title' => 'Cross‑Channel Learning', 'copy' => 'Wins on LinkedIn teach Instagram & email'],
        ['icon' => '📊', 'title' => 'Real‑Time Evolution', 'copy' => 'Dashboards that feel like mission control'],
        ['icon' => '♾️', 'title' => 'Portfolio Power', 'copy' => 'Run many ideas in parallel; back the winners'],
      ],
    ],
    [
      'id' => 'cta',
      'bg' => 'bg-gradient-to-r from-purple-900 to-pink-900',
      'title' => 'Your Ideas Are <span class=\"text-white\">Waiting</span>',
      'content_html' => '<p class=\"text-xl md:text-2xl mb-12 max-w-3xl mx-auto text-gray-200\">No credit card. No commitment. Just pure potential.</p>',
      'cta' => ['label' => 'Spin It Up 🧬', 'href' => '#signup'],
    ],
  ],

  // Footer
  'footer' => [
    'copy' => 'Where ideas don’t just happen. They explode.'
  ],
];
"""

# brand.css
brand_css = r"""/* SpinItUp Tailwind Starter – brand.css
   Tokens & component styles (framework-agnostic)
*/
:root {
  --brand-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #fda085 100%);
  --hero-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  --glass-bg: rgba(255,255,255,0.05);
  --glass-border: rgba(255,255,255,0.1);
  --glass-hover: rgba(255,255,255,0.08);
  --card-blur: 10px;
}

* { font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Noto Sans, Ubuntu, Cantarell, Helvetica Neue, Arial, "Apple Color Emoji", "Segoe UI Emoji"; }

.gradient-text {
  background: var(--brand-gradient);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  background-size: 200% 200%;
  animation: gradient-shift 3s ease infinite;
}

@keyframes gradient-shift {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

.hero-bg {
  background: var(--hero-bg);
  position: relative;
  overflow: hidden;
}
.hero-bg::before {
  content: "";
  position: absolute;
  inset: 0;
  background-image:
    radial-gradient(circle at 20% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
    radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 0%, transparent 50%);
  animation: float 20s ease-in-out infinite;
}
@keyframes float {
  0%,100%{ transform: translateY(0) rotate(0deg); }
  33%{ transform: translateY(-10px) rotate(1deg); }
  66%{ transform: translateY(10px) rotate(-1deg); }
}

.glass-card {
  background: var(--glass-bg);
  backdrop-filter: blur(var(--card-blur));
  border: 1px solid var(--glass-border);
  transition: all .3s ease;
}
.glass-card:hover {
  background: var(--glass-hover);
  transform: translateY(-4px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.3);
}

.process-card {
  background: linear-gradient(135deg, rgba(102,126,234,0.1), rgba(118,75,162,0.1));
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(var(--card-blur));
  transition: all .35s cubic-bezier(.175,.885,.32,1.275);
  position: relative; overflow: hidden;
}
.process-card::before {
  content: "";
  position: absolute; inset: 0; left: -100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.22), transparent);
  transition: left .5s ease;
}
.process-card:hover::before { left: 100%; }
.process-card:hover { transform: translateY(-8px) scale(1.015); box-shadow: 0 30px 60px rgba(102,126,234,0.25); }

.metric-card {
  background: rgba(255,255,255,0.03);
  border: 1px solid var(--glass-border);
  backdrop-filter: blur(var(--card-blur));
  transition: all .3s ease;
}
.metric-card:hover { background: rgba(255,255,255,0.06); transform: scale(1.03); }

.cta-button {
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  position: relative; overflow: hidden;
  transition: all .3s ease;
}
.cta-button::before {
  content:""; position:absolute; inset:0; left:-100%;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.35), transparent);
  transition: left .5s ease;
}
.cta-button:hover::before { left: 100%; }
.cta-button:hover { transform: scale(1.05); box-shadow: 0 20px 40px rgba(245,87,108,0.4); }

.scroll-indicator { animation: bounce 2s infinite; }
@keyframes bounce { 0%,20%,50%,80%,100%{ transform: translateY(0); } 40%{ transform: translateY(-10px); } 60%{ transform: translateY(-5px); } }

/* Reveal on scroll helper */
.reveal { opacity: 0; transform: translateY(16px); transition: all .6s ease-out; }
.reveal.revealed { opacity: 1; transform: translateY(0); }

/* Respect reduced motion */
@media (prefers-reduced-motion: reduce) {
  .gradient-text, .scroll-indicator, .process-card::before, .cta-button::before { animation: none !important; }
  .reveal { transition: opacity .3s ease-out; transform: none; }
}
"""

# brand.js
brand_js = r"""// SpinItUp Starter – brand.js
// IntersectionObserver reveal + tiny helpers

(function(){
  const els = document.querySelectorAll('.reveal, .glass-card, .metric-card, .process-card');
  const obs = new IntersectionObserver((entries)=>{
    entries.forEach(e => { if(e.isIntersecting){ e.target.classList.add('revealed'); } });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
  els.forEach(el => obs.observe(el));

  // Global audio manager (optional)
  window.audioManager = window.audioManager || {
    pauseAll() {
      document.querySelectorAll('audio').forEach(a => { if(!a.paused){ a.pause(); a.dispatchEvent(new Event('pause')); } });
    },
    async play(el){
      this.pauseAll();
      return el.play();
    }
  };
})();
"""

# lib/components.php
components_php = """<?php
// Generic rendering helpers for sections/cards/hero

function render_hero($brand, $hero) {
  $metrics = $hero['metrics'] ?? [];
  $cta = $hero['primary_cta'] ?? null;
  ?>
  <section class="hero-bg min-h-[100svh] flex items-center justify-center relative">
    <div class="container mx-auto px-6 py-20 relative z-10">
      <div class="text-center">
        <h1 class="text-6xl md:text-8xl font-black mb-6">
          <span class="gradient-text"><?= htmlspecialchars($hero['title']) ?></span>
        </h1>
        <p class="text-2xl md:text-3xl font-light mb-4 text-gray-100"><?= htmlspecialchars($hero['subtitle']) ?></p>
        <p class="text-xl md:text-2xl mb-10 text-gray-200 max-w-3xl mx-auto"><?= htmlspecialchars($hero['lede']) ?></p>
        <?php if ($cta): ?>
          <a href="<?= htmlspecialchars($cta['href']) ?>" class="cta-button inline-block text-white font-bold py-4 px-8 md:py-6 md:px-12 rounded-full text-lg md:text-xl shadow-2xl">
            <?= htmlspecialchars($cta['label']) ?>
          </a>
        <?php endif; ?>
        <?php if ($metrics): ?>
        <div class="mt-12 grid grid-cols-3 gap-6 max-w-xl mx-auto">
          <?php foreach ($metrics as $m): ?>
            <div class="metric-card p-4 rounded-lg text-center reveal">
              <div class="text-2xl md:text-3xl font-bold gradient-text"><?= htmlspecialchars($m['value']) ?></div>
              <div class="text-xs md:text-sm text-gray-400"><?= htmlspecialchars($m['label']) ?></div>
            </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
      <div class="absolute bottom-10 left-1/2 -translate-x-1/2 scroll-indicator">
        <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
      </div>
    </div>
  </section>
  <?php
}

function render_section($sec){
  $id   = $sec['id'] ?? '';
  $bg   = $sec['bg'] ?? 'bg-gray-900';
  $title= $sec['title'] ?? '';
  $content_html = $sec['content_html'] ?? '';
  $cards = $sec['cards'] ?? null;
  $cta   = $sec['cta'] ?? null;
  ?>
  <section id="<?= htmlspecialchars($id) ?>" class="py-20 <?= htmlspecialchars($bg) ?>">
    <div class="container mx-auto px-6">
      <div class="max-w-6xl mx-auto">
        <?php if ($title): ?>
          <h2 class="text-4xl md:text-5xl font-bold text-center mb-12"><?= $title ?></h2>
        <?php endif; ?>

        <?php if ($content_html): ?>
          <div class="max-w-4xl mx-auto reveal"><?= $content_html ?></div>
        <?php endif; ?>

        <?php if ($cards): ?>
          <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto mt-10">
            <?php foreach ($cards as $c): ?>
              <div class="glass-card p-8 rounded-xl text-center reveal">
                <div class="text-5xl mb-4"><?= htmlspecialchars($c['icon']) ?></div>
                <h3 class="text-xl font-bold mb-2"><?= htmlspecialchars($c['title']) ?></h3>
                <p class="text-gray-400"><?= htmlspecialchars($c['copy']) ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if ($cta): ?>
          <div class="text-center mt-12">
            <a href="<?= htmlspecialchars($cta['href']) ?>" class="cta-button inline-block text-white font-bold py-4 px-8 rounded-full text-lg shadow-2xl">
              <?= htmlspecialchars($cta['label']) ?>
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <?php
}
"""

# partials/head.php
head_php = """<?php
$config = $config ?? [];
$brand = $config['brand'] ?? [];
$title = ($brand['name'] ?? 'SpinItUp') . ' – Starter';
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($title) ?></title>
  <meta name="description" content="Tailwind + PHP starter with glassmorphism and gradient vibe." />

  <!-- Tailwind (CDN JIT) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          container: { center: true, padding: '1.5rem' },
          fontFamily: { sans: ['Inter', 'ui-sans-serif', 'system-ui'] },
        }
      }
    }
  </script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Brand styles + helpers -->
  <link rel="stylesheet" href="assets/brand.css" />
  <script defer src="assets/brand.js"></script>
</head>
<body class="bg-gray-900 text-white overflow-x-hidden">
"""

# partials/footer.php
footer_php = """<?php $footer = $config['footer'] ?? []; ?>
<footer class="py-12 bg-gray-900 border-t border-gray-800">
  <div class="container mx-auto px-6 text-center">
    <p class="text-2xl font-bold gradient-text mb-4"><?= htmlspecialchars($config['brand']['name'] ?? 'SpinItUp') ?></p>
    <p class="text-gray-400"><?= htmlspecialchars($footer['copy'] ?? '') ?></p>
  </div>
</footer>
</body>
</html>
"""

# index.php
index_php = """<?php
// SpinItUp Tailwind Starter – index.php
$config = require __DIR__ . '/config.php';
require __DIR__ . '/lib/components.php';

// Make $config available to partials
include __DIR__ . '/partials/head.php';
?>

<?php
// HERO
render_hero($config['brand'], $config['hero']);

// SECTIONS
foreach ($config['sections'] as $sec) {
  render_section($sec);
}

include __DIR__ . '/partials/footer.php';
"""
# README
readme = """# SpinItUp Tailwind Starter (PHP)

A tiny, production‑ready skeleton that reproduces the “SpinItUp” dark + glass + gradient vibe with Tailwind (CDN) and plain PHP includes.

## What you get
- **Tokens** in `config.php` and `assets/brand.css` (brand gradient, hero bg, glass styles, animations).
- **Components** in `lib/components.php` (`render_hero`, `render_section` with cards & CTA).
- **Section skeleton** via `config.php['sections']` to add/arrange sections without touching markup.
- **Pacing + rhythm** baked in (`py-20`, container rails, grids).

## Quick start
1. Drop the folder onto any PHP server.
2. Open `index.php` — you should see the starter.
3. Change copy, cards, colours in `config.php`. Duplicate/arrange sections by editing the `sections` array.
4. For new pages, copy the folder and tweak `config.php` only.

## Create sections
Each section is an array:
```php
[
  'id' => 'features',
  'bg' => 'bg-gray-900', // or 'bg-gray-800' or a gradient class
  'title' => 'Your <span class="gradient-text">Command Centre</span>',
  'content_html' => '<p>Any HTML you like (kept to reasonable width).</p>',
  'cards' => [
    ['icon' => '🌐', 'title' => 'Label', 'copy' => 'Short body'],
    // ...
  ],
  'cta' => ['label' => 'Get Started', 'href' => '#'],
]
```
All fields are optional except `id`.

## Tokens
- Adjust CSS variables in `assets/brand.css` for global vibes (gradient, hero, glass).
- Tailwind utility classes remain flexible; you can sprinkle them as needed in content.

## Notes
- Hero is `min-h-[100svh]` so it truly fills the viewport on mobile (accounts for browser chrome).
- Animations respect `prefers-reduced-motion`.
- If you need audio/video blocks, reuse your existing custom players and call `window.audioManager.play(el)` to prevent overlaps.

Happy shipping!
"""

files = {
    f"{base}/config.php": config_php,
    f"{base}/assets/brand.css": brand_css,
    f"{base}/assets/brand.js": brand_js,
    f"{base}/lib/components.php": components_php,
    f"{base}/partials/head.php": head_php,
    f"{base}/partials/footer.php": footer_php,
    f"{base}/index.php": index_php,
    f"{base}/README.md": readme
}

for path, content in files.items():
    with open(path, "w", encoding="utf-8") as f:
        f.write(content)

# Provide a directory tree for confirmation
def tree(path):
    tree_lines = []
    for root, dirs, files in os.walk(path):
        level = root.replace(path, '').count(os.sep)
        indent = '  ' * level
        tree_lines.append(f"{indent}{os.path.basename(root)}/")
        subindent = '  ' * (level + 1)
        for f in files:
            tree_lines.append(f"{subindent}{f}")
    return "\n".join(tree_lines)

print(tree(base))
