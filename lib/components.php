<?php
function e($str){ return htmlspecialchars($str, ENT_QUOTES, 'UTF-8'); }

function render_hero($brand, $hero){
?>
<section class="hero-bg min-h-[100svh] flex items-center justify-center text-center px-6">
  <div class="max-w-3xl">
    <h1 class="text-4xl md:text-6xl font-extrabold gradient-text mb-6"><?= $hero['title']; ?></h1>
    <p class="text-xl md:text-2xl text-gray-200 mb-8"><?= $hero['lede']; ?></p>
    <?php if(isset($hero['primary_cta'])): ?>
      <a href="<?= e($hero['primary_cta']['href']); ?>" class="cta-button"><?= e($hero['primary_cta']['label']); ?></a>
    <?php endif; ?>
    <?php if(!empty($hero['metrics'])): ?>
      <div class="mt-12 grid grid-cols-1 sm:grid-cols-3 gap-6">
        <?php foreach($hero['metrics'] as $m): ?>
          <div class="metric-card text-center">
            <div class="text-2xl font-bold"><?= e($m['value']); ?></div>
            <div class="text-gray-400"><?= e($m['label']); ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php
}

function render_section($sec){
  $bg = $sec['bg'] ?? 'bg-gray-800';
?>
<section id="<?= e($sec['id']); ?>" class="<?= e($bg); ?> py-20">
  <div class="container mx-auto px-6 max-w-4xl">
    <?php if(isset($sec['title'])): ?>
      <h2 class="text-3xl md:text-4xl font-bold mb-8 gradient-text"><?= $sec['title']; ?></h2>
    <?php endif; ?>
    <?php if(isset($sec['content_html'])): ?>
      <div class="text-lg text-gray-300 space-y-6 reveal"><?= $sec['content_html']; ?></div>
    <?php endif; ?>
    <?php if(!empty($sec['cards'])): ?>
      <div class="mt-12 grid gap-6 sm:grid-cols-2 md:grid-cols-3">
        <?php foreach($sec['cards'] as $card): ?>
          <div class="glass-card p-6 reveal">
            <?php if(isset($card['image'])): ?>
              <img src="<?= e($card['image']); ?>" alt="<?= e($card['title']); ?>" class="w-full h-40 object-cover rounded-lg mb-4" />
            <?php elseif(isset($card['icon'])): ?>
              <div class="text-3xl mb-2"><?= e($card['icon']); ?></div>
            <?php endif; ?>
            <h3 class="text-xl font-semibold mb-2"><?= e($card['title']); ?></h3>
            <p class="text-gray-400 text-sm"><?= e($card['copy']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php if(isset($sec['cta'])): ?>
      <div class="mt-12 text-center">
        <a href="<?= e($sec['cta']['href']); ?>" class="cta-button"><?= e($sec['cta']['label']); ?></a>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php
}
