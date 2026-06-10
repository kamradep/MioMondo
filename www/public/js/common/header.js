document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.querySelector('.hamburger');
            const mobileMenu = document.querySelector('.mobile-menu');
            const overlay = document.querySelector('.overlay');
            
            hamburger.addEventListener('click', function() {
                this.classList.toggle('open');
                mobileMenu.classList.toggle('open');
                overlay.classList.toggle('open');
                
                if (mobileMenu.classList.contains('open')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            });
            
            overlay.addEventListener('click', function() {
                hamburger.classList.remove('open');
                mobileMenu.classList.remove('open');
                this.classList.remove('open');
                document.body.style.overflow = '';
            });
            
            const mobileLinks = document.querySelectorAll('.mobile-menu a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    hamburger.classList.remove('open');
                    mobileMenu.classList.remove('open');
                    overlay.classList.remove('open');
                    document.body.style.overflow = '';
                });
            });
        });