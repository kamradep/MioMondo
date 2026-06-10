// login.js
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('.login-form');
    const loginButton = document.querySelector('.login-button');
    
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            // Animation de chargement
            loginButton.classList.add('loading');
            loginButton.innerHTML = '<i class="fas fa-spinner"></i> Connexion en cours...';
            
            // Simuler un délai pour le démo (à retirer en production)
            setTimeout(() => {
                loginButton.classList.remove('loading');
                loginButton.innerHTML = '<i class="fas fa-sign-in-alt"></i> Se connecter';
            }, 2000);
        });
        
        // Effet au focus sur les inputs
        const inputs = document.querySelectorAll('.input-with-icon input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('i').style.color = '#3498db';
                this.parentElement.querySelector('i').style.opacity = '1';
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.parentElement.querySelector('i').style.color = '#a0aec0';
                    this.parentElement.querySelector('i').style.opacity = '0.7';
                }
            });
        });
    }
    
    // Effet de vague sur le bouton au chargement
    if (loginButton) {
        setTimeout(() => {
            loginButton.classList.add('wave-effect');
            setTimeout(() => {
                loginButton.classList.remove('wave-effect');
            }, 1000);
        }, 500);
    }
});

 // Désactiver le double-clic sur le formulaire
    document.getElementById('loginForm')?.addEventListener('submit', function() {
        this.classList.add('form-disabled');
        document.getElementById('submitBtn').disabled = true;
    });