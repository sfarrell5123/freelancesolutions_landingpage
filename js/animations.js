document.addEventListener('DOMContentLoaded', function() {
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                
                if (entry.target.classList.contains('process-card')) {
                    const cards = document.querySelectorAll('.process-card');
                    cards.forEach((card, index) => {
                        setTimeout(() => {
                            card.classList.add('visible');
                        }, index * 100);
                    });
                }
            }
        });
    }, observerOptions);

    const fadeElements = document.querySelectorAll('.fade-in');
    fadeElements.forEach(el => observer.observe(el));

    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function() {
            window.scrollTo({
                top: window.innerHeight,
                behavior: 'smooth'
            });
        });
    }

    const perspectiveCards = document.querySelectorAll('.perspective-card');
    perspectiveCards.forEach(card => {
        card.addEventListener('click', function() {
            const target = this.dataset.target;
            const targetSection = document.getElementById(target);
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    const ctaButtons = document.querySelectorAll('.cta-button');
    ctaButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.animation = 'pulse 0.6s ease-in-out';
        });
        button.addEventListener('mouseleave', function() {
            this.style.animation = '';
        });
    });

    let lastScrollTop = 0;
    let ticking = false;

    function updateScrollProgress() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;
        
        document.documentElement.style.setProperty('--scroll-progress', scrollPercent + '%');
        
        lastScrollTop = scrollTop;
        ticking = false;
    }

    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(updateScrollProgress);
            ticking = true;
        }
    });

    const parallaxElements = document.querySelectorAll('.parallax');
    
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        
        parallaxElements.forEach(element => {
            const speed = element.dataset.speed || 0.5;
            const yPos = -(scrolled * speed);
            element.style.transform = `translateY(${yPos}px)`;
        });
    });

    const counters = document.querySelectorAll('.metric-number');
    const speed = 200;
    
    const countUp = (counter) => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText.replace(/[^0-9]/g, '');
        const increment = target / speed;
        
        if (count < target) {
            counter.innerText = Math.ceil(count + increment);
            setTimeout(() => countUp(counter), 10);
        } else {
            counter.innerText = target.toLocaleString();
        }
    };
    
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                entry.target.classList.add('counted');
                countUp(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => {
        counter.innerText = '0';
        counterObserver.observe(counter);
    });

    const lazyImages = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                imageObserver.unobserve(img);
            }
        });
    });
    
    lazyImages.forEach(img => imageObserver.observe(img));

    const videoPlayers = document.querySelectorAll('.video-player');
    
    videoPlayers.forEach(player => {
        const video = player.querySelector('video');
        const playBtn = player.querySelector('.play-btn');
        const overlay = player.querySelector('.video-overlay');
        
        if (playBtn && video) {
            playBtn.addEventListener('click', () => {
                if (video.paused) {
                    video.play();
                    overlay.style.opacity = '0';
                    overlay.style.pointerEvents = 'none';
                } else {
                    video.pause();
                    overlay.style.opacity = '1';
                    overlay.style.pointerEvents = 'all';
                }
            });
            
            video.addEventListener('ended', () => {
                overlay.style.opacity = '1';
                overlay.style.pointerEvents = 'all';
            });
        }
    });

    const style = document.createElement('style');
    style.textContent = `
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    `;
    document.head.appendChild(style);

    if ('IntersectionObserver' in window === false) {
        const elements = document.querySelectorAll('.fade-in');
        elements.forEach(el => el.classList.add('visible'));
    }
});