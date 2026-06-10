<div class="login-page">
    <div class="login-container">
        <div class="login-header">
            <h1>Connexion Administrateur</h1>
        </div>
        
        <?php if (!empty($error)): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                <?= htmlspecialchars($error) ?>
                
                <?php if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 1): ?>
                    <div class="attempts-info">
                        <?php if ($_SESSION['login_attempts'] >= 3): ?>
                            <p class="blocked-message">
                                <i class="fas fa-lock"></i> Compte bloqué temporairement (3 minutes)
                            </p>
                        <?php else: ?>
                            <p class="attempts-count">
                                Tentative <?= $_SESSION['login_attempts'] ?>/3
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (!isset($_SESSION['login_blocked_until']) || time() >= $_SESSION['login_blocked_until']): ?>
            <form method="POST" action="bigdeadminMioMondo.php?route=log" class="login-form">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" required placeholder="Entrez votre nom d'utilisateur">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-with-icon">
                        <i class="fas fa-key"></i>
                        <input type="password" id="password" name="password" required placeholder="Entrez votre mot de passe">
                    </div>
                </div>
                
                <button type="submit" class="login-button">
                    <i class="fas fa-sign-in-alt"></i> Se connecter
                </button>
            </form>
        <?php else: ?>
            <div class="blocked-message-container">
                <div class="blocked-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3>Accès temporairement bloqué</h3>
                <p>Vous avez dépassé le nombre maximal de tentatives autorisées.</p>
                <p class="countdown">Veuillez réessayer dans <?= ceil(($_SESSION['login_blocked_until'] - time()) / 60) ?> minutes.</p>
            </div>
        <?php endif; ?>
    </div>
</div>