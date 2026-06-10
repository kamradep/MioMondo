        document.addEventListener('DOMContentLoaded', function() {
            // Animation au chargement
            setTimeout(() => {
                document.querySelector('h1').classList.add('animate-in');
            }, 100);
            
            // Animation des éléments au scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const animateOnScroll = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add('animate-in');
                        }, index * 100);
                        animateOnScroll.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            // Observer tous les éléments à animer
            document.querySelectorAll('.animate-item').forEach(el => {
                animateOnScroll.observe(el);
            });
            
            // Gestion du formulaire
            const form = document.getElementById('reservationForm');
            const modal = document.getElementById('confirmationModal');
            const clientName = document.getElementById('clientName');
            const reservationDate = document.getElementById('reservationDate');
            const reservationTime = document.getElementById('reservationTime');
            const closeBtn = document.getElementById('closeModal');
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Récupérer les valeurs du formulaire
                const name = document.getElementById('name').value;
                const date = document.getElementById('date').value;
                const time = document.getElementById('time').value;
                
                // Formater la date en français
                const dateObj = new Date(date);
                const options = { weekday: 'long', day: 'numeric', month: 'long' };
                const formattedDate = dateObj.toLocaleDateString('fr-FR', options);
                
                // Mettre à jour la modal avec les infos de réservation
                clientName.textContent = name;
                reservationDate.textContent = formattedDate;
                reservationTime.textContent = time;
                
                // Afficher la modal
                modal.classList.add('active');
                
                // Réinitialiser le formulaire après un délai
                setTimeout(() => {
                    form.reset();
                }, 1000);
            });
            
            // Fermer la modal
            closeBtn.addEventListener('click', function() {
                modal.classList.remove('active');
            });
            
            // Fermer la modal en cliquant à l'extérieur
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
            
            // Définir la date minimale (aujourd'hui)
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('date').min = today;
        });