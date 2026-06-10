<?php

require_once 'app/controller/controller.php';
require_once 'app/model/model.php';

 function SubmitReservation(){
    if (isset($_POST['envoyer'])) {
        extract($_POST);

    $nom = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['phone'] ?? '';
    $date = $_POST['date'] ?? '';
    $heure = $_POST['time'] ?? '';
    $nombres = $_POST['guests'] ?? '';
    $notes = $_POST['notes'] ?? '';

    try {
        $pdo = getDatabaseConnexion();

        $query = "INSERT INTO reservations (nom, email, telephone, date_reservation, heure, nombre_personnes, notes) 
                  VALUES (:nom, :email, :telephone, :date, :heure, :nombre, :notes)";
        
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':telephone' => $telephone,
            ':date' => $date,
            ':heure' => $heure,
            ':nombre' => $nombres,
            ':notes' => $notes
        ]);

        

    } catch (PDOException $e) {
        echo "Erreur lors de l'enregistrement : " . $e->getMessage();
    }
}
 }