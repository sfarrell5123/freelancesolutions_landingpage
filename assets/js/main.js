// FreelanceSolutions Landing — main.js
(function(){
  // Reveal on scroll
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) e.target.classList.add('revealed');
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });
  document.querySelectorAll('.reveal, .glass-card, .process-card, .metric-card').forEach(el => observer.observe(el));

  // Global audio manager: only one plays at a time
  window.audioManager = window.audioManager || {
    pauseAll(){ document.querySelectorAll('audio').forEach(a => { if(!a.paused){ a.pause(); a.dispatchEvent(new Event('pause')); } }); },
    async play(el){ this.pauseAll(); try { await el.play(); } catch(e){} }
  };

  // Video overlays (simulated with images)
  document.querySelectorAll('[data-media-block] .play-overlay').forEach(overlay => {
    overlay.addEventListener('click', () => {
      const block = overlay.closest('[data-media-block]');
      block.classList.add('playing');
    });
  });

  // Audio chip controls
  document.querySelectorAll('[data-audio]').forEach(chip => {
    const audio = chip.querySelector('audio');
    const playBtn = chip.querySelector('[data-action="toggle"]');
    const label = chip.querySelector('[data-label]');
    playBtn?.addEventListener('click', async () => {
      if (audio.paused) { await window.audioManager.play(audio); } else { audio.pause(); }
    });
    audio.addEventListener('play', () => { chip.classList.add('playing'); if(label) label.textContent = 'Now playing'; });
    audio.addEventListener('pause', () => { chip.classList.remove('playing'); if(label) label.textContent = 'Paused'; });
  });
})();

