<?php $mb = $config['media_business'] ?? []; $shop = $config['links']['shop'] ?? '#'; ?>
<section id="business" class="py-20 bg-gray-900">
  <div class="container mx-auto px-6">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-10"><?= htmlspecialchars($mb['title'] ?? '') ?></h2>

      <div class="grid md:grid-cols-2 gap-8 items-center">
        <div class="media-block glass-card rounded-2xl overflow-hidden reveal" data-media-block>
          <img src="<?= htmlspecialchars($mb['video_image'] ?? 'images/code_html_code_on_screen_zoomed_16x9.jpg') ?>" alt="Impact preview" class="w-full h-full object-cover" />
          <div class="play-overlay">
            <div class="glass-card rounded-full p-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 24 24" fill="white"><path d="M8 5v14l11-7z"/></svg>
            </div>
          </div>
        </div>
        <div class="reveal">
          <div class="audio-chip rounded-xl p-4 flex items-center gap-4 mb-6" data-audio>
            <button class="glass-card rounded-full p-3" data-action="toggle" aria-label="Play/Pause">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
            </button>
            <div>
              <div class="text-sm text-gray-400" data-label>Paused</div>
              <div class="text-white font-semibold text-lg"><?= htmlspecialchars($mb['audio_label'] ?? 'Audio') ?></div>
            </div>
            <audio preload="none" src="https://cdn.pixabay.com/download/audio/2022/03/15/audio_1b8cc1f5b7.mp3?filename=inspiring-epic-ambient-112199.mp3"></audio>
          </div>

          <p class="text-gray-300 text-lg mb-6">Every order transforms into meals and momentum for Filipino developers. Wear your support and tell the world you back builders.</p>
          <a href="<?= htmlspecialchars($shop) ?>" class="cta-button inline-block text-white font-bold py-3 px-6 rounded-full shadow-2xl">Buy the Shirt</a>
        </div>
      </div>
    </div>
  </div>
</section>

