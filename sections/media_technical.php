<?php $mt = $config['media_technical'] ?? []; $shop = $config['links']['shop'] ?? '#'; ?>
<section id="technical" class="py-20 bg-gray-800">
  <div class="container mx-auto px-6">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-10"><?= htmlspecialchars($mt['title'] ?? '') ?></h2>

      <div class="grid md:grid-cols-2 gap-8 items-center">
        <div class="reveal order-2 md:order-1">
          <ul class="space-y-4 text-gray-300 text-lg">
            <li>• Profit pool updates weekly with transparent summaries.</li>
            <li>• Payouts prioritize meals, then bandwidth, tools, and training.</li>
            <li>• Builders share demos; supporters see impact in action.</li>
            <li>• Community votes surface standout projects for bonus support.</li>
          </ul>
          <a href="<?= htmlspecialchars($shop) ?>" class="mt-6 inline-block cta-button text-white font-bold py-3 px-6 rounded-full shadow-2xl">Support with a Shirt</a>
        </div>
        <div class="media-block glass-card rounded-2xl overflow-hidden reveal order-1 md:order-2" data-media-block>
          <img src="<?= htmlspecialchars($mt['video_image'] ?? 'images/code_html_code_on_screen_zoomed_16x9.jpg') ?>" alt="Architecture preview" class="w-full h-full object-cover" />
          <div class="play-overlay">
            <div class="glass-card rounded-full p-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 24 24" fill="white"><path d="M8 5v14l11-7z"/></svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

