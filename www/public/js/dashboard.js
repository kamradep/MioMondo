// Animation au chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.animate-item');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('animate-in');
            }, 150 * index);
        });
    });