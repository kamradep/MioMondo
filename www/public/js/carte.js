        document.addEventListener('DOMContentLoaded', function() {
            // Animation au chargement
            setTimeout(() => {
                document.querySelector('h1').classList.add('animate-in');
            }, 100);
            
            // Enhanced scroll animation with staggered delays
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const animateOnScroll = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        // Add base delay based on element type
                        let baseDelay = 0;
                        
                        if (entry.target.tagName === 'H2') baseDelay = 100;
                        else if (entry.target.classList.contains('menu-section')) baseDelay = 200;
                        else if (entry.target.classList.contains('menu-item')) baseDelay = 300;
                        else if (entry.target.classList.contains('special-menu')) baseDelay = 150;
                        
                        // Add staggered delay based on index
                        const staggerDelay = (index % 5) * 50;
                        
                        setTimeout(() => {
                            entry.target.classList.add('animate-in');
                            
                            // Special handling for menu items with descriptions
                            if (entry.target.querySelector('.menu-item-desc')) {
                                const desc = entry.target.querySelector('.menu-item-desc');
                                setTimeout(() => {
                                    desc.classList.add('animate-in');
                                }, 100);
                            }
                        }, baseDelay + staggerDelay);
                        
                        animateOnScroll.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            // Observe all animatable elements
            document.querySelectorAll('.animate-item').forEach(el => {
                animateOnScroll.observe(el);
            });
            
            // Add hover effect for menu items
            document.querySelectorAll('.menu-item').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.borderBottomColor = '#d4a76a';
                });
                item.addEventListener('mouseleave', function() {
                    this.style.borderBottomColor = '#e0d5c8';
                });
            });
        });