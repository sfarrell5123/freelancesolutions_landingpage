<div class="audio-player-container">
    <div class="audio-player">
        <button class="play-button" id="audioToggle" aria-label="Play audio">
            <svg class="play-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M8 5v14l11-7z"/>
            </svg>
            <svg class="pause-icon" style="display: none;" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <rect x="6" y="4" width="4" height="16"/>
                <rect x="14" y="4" width="4" height="16"/>
            </svg>
        </button>
        <div class="audio-info">
            <span class="audio-emoji">🎙️</span>
            <div class="audio-text">
                <span class="audio-title">Listen to the Hype!</span>
                <span class="audio-subtitle">Funny radio play explaining FreelanceSolutions</span>
            </div>
        </div>
    </div>
    <audio id="audioElement" preload="metadata">
        <source src="./static/Filipino_hungry_devs_funny.wav" type="audio/wav">
    </audio>
</div>
