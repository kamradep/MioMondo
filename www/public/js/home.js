document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.specialites-track');
    const cards = document.querySelectorAll('.specialite-card');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const dotsContainer = document.querySelector('.nav-dots');
    
    let cardWidth = cards[0].offsetWidth + 20; // Largeur de la carte + gap
    let visibleCards = 1;
    const totalCards = cards.length / 2; // Car nous avons dupliqué les cartes
    let currentIndex = 0;
    
    // Fonction pour calculer le nombre de cartes visibles
    function calculateVisibleCards() {
        const containerWidth = document.querySelector('.specialites-container').offsetWidth;
        cardWidth = cards[0].offsetWidth + 20;
        visibleCards = Math.floor(containerWidth / cardWidth) || 1;
    }
    
    // Créer les points de navigation
    function createDots() {
        dotsContainer.innerHTML = '';
        for (let i = 0; i < totalCards; i++) {
            const dot = document.createElement('div');
            dot.classList.add('nav-dot');
            if (i === 0) dot.classList.add('active');
            dot.dataset.index = i;
            dot.addEventListener('click', () => goToSlide(i));
            dotsContainer.appendChild(dot);
        }
    }
    
    // Mettre à jour la position du track
    function updateTrack() {
        calculateVisibleCards();
        const offset = -currentIndex * cardWidth;
        track.style.transform = `translateX(${offset}px)`;
        
        // Mettre à jour les points actifs
        const dots = document.querySelectorAll('.nav-dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === (currentIndex % totalCards));
        });
    }
    
    // Aller à un slide spécifique
    function goToSlide(index) {
        currentIndex = index;
        updateTrack();
    }
    
    // Slide suivant
    function nextSlide() {
        currentIndex++;
        
        // Effet infini
        if (currentIndex > totalCards - visibleCards) {
            const newCards = Array.from(cards).slice(currentIndex, currentIndex + visibleCards);
            newCards.forEach(card => card.classList.add('slide-in-right'));
            
            setTimeout(() => {
                newCards.forEach(card => card.classList.remove('slide-in-right'));
            }, 500);
            
            if (currentIndex >= totalCards) {
                currentIndex = 0;
            }
        }
        
        updateTrack();
    }
    
    // Slide précédent
    function prevSlide() {
        currentIndex--;
        
        // Effet infini
        if (currentIndex < 0) {
            currentIndex = totalCards - 1;
            
            const newCards = Array.from(cards).slice(currentIndex - visibleCards + 1, currentIndex + 1);
            newCards.forEach(card => card.classList.add('slide-in-left'));
            
            setTimeout(() => {
                newCards.forEach(card => card.classList.remove('slide-in-left'));
            }, 500);
        }
        
        updateTrack();
    }
    
    // Écouteurs d'événements
    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
    
    // Redirection vers la page du plat au clic sur une carte
    cards.forEach(card => {
        card.addEventListener('click', function() {
            const index = this.dataset.index % totalCards;
            window.location.href = `plat-details.php?id=${index + 1}`;
        });
    });
    
    // Navigation au clavier
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowRight') nextSlide();
        if (e.key === 'ArrowLeft') prevSlide();
    });
    
    // Redimensionnement de la fenêtre
    window.addEventListener('resize', () => {
        calculateVisibleCards();
        updateTrack();
    });
    
    // Initialisation
    calculateVisibleCards();
    createDots();
    updateTrack();
    
    // Swipe pour mobile
    let touchStartX = 0;
    let touchEndX = 0;
    
    track.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, {passive: true});
    
    track.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, {passive: true});
    
    function handleSwipe() {
        if (touchEndX < touchStartX - 50) nextSlide();
        if (touchEndX > touchStartX + 50) prevSlide();
    }
});