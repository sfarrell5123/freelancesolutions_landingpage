document.addEventListener('DOMContentLoaded', function() {
    const audioToggle = document.getElementById('audioToggle');
    const audioElement = document.getElementById('audioElement');
    const playIcon = audioToggle.querySelector('.play-icon');
    const pauseIcon = audioToggle.querySelector('.pause-icon');
    
    if (!audioToggle || !audioElement) return;
    
    // Toggle play/pause
    audioToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        
        if (audioElement.paused) {
            // Use the global audio manager if available, otherwise just play
            if (window.audioManager && window.audioManager.play) {
                window.audioManager.play(audioElement);
            } else {
                audioElement.play();
            }
            playIcon.style.display = 'none';
            pauseIcon.style.display = 'block';
        } else {
            audioElement.pause();
            playIcon.style.display = 'block';
            pauseIcon.style.display = 'none';
        }
    });
    
    // Handle audio ended
    audioElement.addEventListener('ended', function() {
        playIcon.style.display = 'block';
        pauseIcon.style.display = 'none';
    });
    
    // Handle audio pause from other sources
    audioElement.addEventListener('pause', function() {
        playIcon.style.display = 'block';
        pauseIcon.style.display = 'none';
    });
    
    // Handle audio play from other sources
    audioElement.addEventListener('play', function() {
        playIcon.style.display = 'none';
        pauseIcon.style.display = 'block';
    });
});

// Global audio manager to prevent multiple audio playing
window.audioManager = window.audioManager || {
    pauseAll() {
        document.querySelectorAll('audio').forEach(a => {
            if (!a.paused) {
                a.pause();
                a.dispatchEvent(new Event('pause'));
            }
        });
    },
    async play(el) {
        this.pauseAll();
        return el.play();
    }
};