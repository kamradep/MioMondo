<?php
// Inclure les fichiers de configuration et de modèle
require_once 'config.php';
require_once 'app/model/model.php';

// Traitement du formulaire s'il a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {
    // Vérifier si l'utilisateur est bloqué
    if ($_SESSION['reservation_attempts'] >= 2) {
        $message = "Vous avez atteint la limite maximale d'essais  (2 maximum). Merci d'appeler le numéro suivant en cas de problème : 02 23 17 64 46.";
        $messageClass = "error";
        $blocked = true;
    } else {
        // Récupération et nettoyage des données
        $name = htmlspecialchars($_POST['name']);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = htmlspecialchars($_POST['phone']);
        $date = $_POST['date'];
        $time = $_POST['time'];
        $guests = intval($_POST['guests']);
        $notes = htmlspecialchars($_POST['notes'] ?? '');

        try {
            // Connexion à la base de données
            $pdo = getDatabaseConnexion();
            
            // Préparation et exécution de la requête
            $stmt = $pdo->prepare("
                INSERT INTO reservations (name, email, phone, date, time, guests, notes)
                VALUES (:name, :email, :phone, :date, :time, :guests, :notes)
            ");
            
            $success = $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':phone' => $phone,
                ':date' => $date,
                ':time' => $time,
                ':guests' => $guests,
                ':notes' => $notes
            ]);
            
            if ($success) {
                // Incrémenter le compteur de réservations réussies
                $_SESSION['reservation_attempts']++;
                
                // Message de succès
                $message = "Votre réservation a bien été enregistrée! (".$_SESSION['reservation_attempts']."/2)";
                $messageClass = "success";
                
                // Bloquer après 2 réservations
                if ($_SESSION['reservation_attempts'] >= 2) {
                    $message .= "<br>Vous avez atteint la limite de réservations.";
                }
            } else {
                $message = "Une erreur est survenue.";
                $messageClass = "error";
            }
            
        } catch (PDOException $e) {
            $message = "Erreur lors de l'enregistrement: " . $e->getMessage();
            $messageClass = "error";
        }
    }
}
?>

<main>
        <div class="margin">
            <!-- Images décoratives -->
            <div class="deco-image deco-1"></div>
            <div class="deco-image deco-2"></div>

            <div class="container" >
                <h1 class="animate-item">Réservation</h1>

                 <?php if (isset($message)): ?>
            <div class="<?php echo $messageClass; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <!-- Formulaire de réservation temporairement désactivé -->
        <!--
        <form class="reservation-form" method="POST">
            <div class="form-group">
                <label for="name">Nom complet</label>
                <input type="text" id="name" name="name" required value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" required value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required value="<?php echo isset($date) ? htmlspecialchars($date) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="time">Heure</label>
                <input type="time" id="time" name="time" required value="<?php echo isset($time) ? htmlspecialchars($time) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="guests">Nombre de personnes</label>
                <select id="guests" name="guests" required>
                    <option value="">Sélectionnez...</option>
                    <?php
                    $options = [
                        1 => "1 personne",
                        2 => "2 personnes", 
                        3 => "3 personnes",
                        4 => "4 personnes",
                        5 => "5 personnes",
                        6 => "6 personnes",
                        7 => "7 personnes",
                        8 => "8 personnes",
                        9 => "Groupe (9+)"
                    ];
                    
                    foreach ($options as $value => $label) {
                        $selected = (isset($guests) && $guests == $value) ? 'selected' : '';
                        echo "<option value=\"$value\" $selected>$label</option>";
                    }
                    ?>
                </select>
            </div>
             
            <div class="form-group full-width">
                <label for="notes">Demandes spéciales (allergies, anniversaire...)</label>
                <textarea id="notes" name="notes"><?php echo isset($notes) ? htmlspecialchars($notes) : ''; ?></textarea>
            </div>
            
            <button type="submit" value="Reservation" name="envoyer">Réserver une table</button>
        </form>
        -->

        <div class="reservation-window animate-item">
            <h2>Réservation par téléphone</h2>
            <p>Toutes les réservations sont à réaliser en appelant le numéro suivant :</p>
            <p class="reservation-phone" href="tel:0223176446" ><strong >02 23 17 64 46</strong></p>
            <p>Nous vous remercions de votre compréhension.</p>
        </div>
                
                <div class="contact-info animate-item">
                    <h2>Contact direct</h2>
                    <p><strong>Téléphone:</strong> 02 23 17 64 46</p>
                    <p><strong>Email:</strong> miomondo.vsm@gmail.com</p>
                    <p><strong>Horaires:</strong> Du mardi au dimanche, 12h-14h30 et 19h-22h30</p>
                </div>
            </div>
        </div>

        <!-- Modal de confirmation -->
        <div class="confirmation-modal" id="confirmationModal">
            <div class="confirmation-content">
                <div class="confirmation-icon">✓</div>
                <h2 class="confirmation-title">Réservation confirmée !</h2>
                <p class="confirmation-message">
                    Merci <span id="clientName"></span> pour votre réservation chez <strong>MIO MONDO</strong>.<br>
                    Nous vous attendons le <span id="reservationDate"></span> à <span id="reservationTime"></span>.<br>
                    Une confirmation a été envoyée à votre adresse email.
                </p>
                <button class="confirmation-btn" id="closeModal">Fermer</button>
            </div>
        </div>
    </main>
    <style>
        .reservation-window {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #e0e0e0;
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin: 30px 0;
            max-width: 720px;
            text-align: center;
        }

        .reservation-window h2 {
            margin-bottom: 18px;
            font-size: 1.9rem;
        }

        .reservation-window p {
            margin: 12px 0;
            line-height: 1.7;
            color: #333;
        }

        .reservation-window .reservation-phone {
            font-size: 1.8rem;
            font-weight: 700;
            color: #b71c1c;
            margin: 18px 0;
        }
    </style>