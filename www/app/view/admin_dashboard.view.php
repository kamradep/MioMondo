<main class="reservations-container">
    <div class="dashboard">
    <div class="dashboard-header">
        <h1>Tableau de Bord Administrateur</h1>
        <div class="user-info">
            <span class="welcome-message">Connecté en tant que: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
            <a href="bigdeadminMioMondo.php?route=logout" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Déconnexion
            </a>
        </div>
    </div>
</div>

    <div class="reservations-header">
        <h1>Réservations</h1>
    </div>
    <div class="reservations-grid">
        <?php foreach ($reservations as $reservation):?>
            
            <!-- Carte de réservation 1 -->
                <div class="reservation-card animate-item">
                    <div class="card-header">
                        <h3><?= $reservation['name'] ?></h3>
                        <div class="card-date"><?= $reservation['date'] ?></div>
                    </div>
                    <div class="card-body">
                        <div class="card-detail">
                            <span class="detail-icon">📧</span>
                            <span class="detail-text"><?= $reservation['email'] ?></span>
                        </div>
                        <div class="card-detail">
                            <span class="detail-icon">📱</span>
                            <span class="detail-text"><?= $reservation['phone'] ?></span>
                        </div>
                        <div class="card-detail">
                            <span class="detail-icon">🕒</span>
                            <span class="detail-text"><?= $reservation['time'] ?></span>
                        </div>
                        <div class="card-detail">
                            <span class="detail-icon">👥</span>
                            <span class="detail-text"><?= $reservation['guests'] ?></span>
                        </div>
                        <div class="card-notes">
                            <p><?= $reservation['notes'] ?></p>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
</main>
