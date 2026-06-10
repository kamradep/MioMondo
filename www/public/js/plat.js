        document.addEventListener('DOMContentLoaded', function() {
            // Activer les animations
            setTimeout(() => {
                document.getElementById('main-container').classList.add('loaded');
                
                // Animation des éléments
                const animateElements = document.querySelectorAll('.animate');
                animateElements.forEach(el => {
                    const delay = el.classList.contains('delay-1') ? 100 : 
                                 el.classList.contains('delay-2') ? 200 :
                                 el.classList.contains('delay-3') ? 300 :
                                 el.classList.contains('delay-4') ? 400 : 500;
                    setTimeout(() => {
                        el.style.opacity = '1';
                        el.style.transform = 'translateY(0)';
                    }, delay);
                });
            }, 50);
            
            // Gestion du bouton favori
            const favoriteBtn = document.querySelector('.btn-secondary');
            favoriteBtn.addEventListener('click', function() {
                const icon = this.querySelector('i');
                this.classList.toggle('active');
                
                if (this.classList.contains('active')) {
                    icon.classList.remove('far');
                    icon.classList.add('fas');
                    icon.style.color = '#e74c3c';
                    this.innerHTML = '<i class="fas fa-heart" style="color: #e74c3c;"></i> Favori';
                } else {
                    icon.classList.remove('fas');
                    icon.classList.add('far');
                    icon.style.color = '';
                    this.innerHTML = '<i class="far fa-heart"></i> Favoris';
                }
            });
            
            // Animation du bouton commander
            const orderBtn = document.querySelector('.btn-primary');
            orderBtn.addEventListener('click', function() {
                this.innerHTML = '<i class="fas fa-check"></i> Ajouté !';
                this.style.background = 'linear-gradient(to right, #2ecc71, #27ae60)';
                
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-shopping-cart"></i> Commander';
                    this.style.background = 'linear-gradient(to right, var(--secondary), #c0392b)';
                }, 2000);
            });
        });