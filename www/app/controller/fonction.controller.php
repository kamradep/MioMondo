<?php

require_once 'app/controller/controller.php';
require_once 'app/model/model.php';
require "PHPMailer/PHPMailerAutoload.php";

SendMailFonction(){


function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;  
        $mail->Username = 'reservation.miomondo@gmail.com';
        $mail->Password = 'MioMondo2000';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="reservation.miomondo@gmail.com";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error ="Please try Later, Error Occured while Processing...";
            return $error; 
        }
        else 
        {
            $error = "Thanks You !! Your email is sent.";  
            return $error;
        }
    }
    
    $to   = 'karmadp7@gmail.com';
    $from = 'reservation.miomondo@gmail.com';
    $name = 'MioMondo';
    $subj = 'Confirmationde votre reservation';
    $msg = 'This is mail about testing mailing using PHP.';
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    

}

SubmitReservation(){
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $telephone = $_POST['phone'] ?? '';
    $date = $_POST['date'] ?? '';
    $heure = $_POST['time'] ?? '';
    $nombres = $_POST['guests'] ?? '';
    $notes = $_POST['notes'] ?? '';

    try {
        $pdo = getDatabaseConnexion();

        $stmt = $pdo->prepare("
            INSERT INTO reservations (nom, email, telephone, date_reservation, heure, nombre_personnes, notes) 
            VALUES (:nom, :email, :telephone, :date, :heure, :nombre, :notes)
        ");

        $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':telephone' => $telephone,
            ':date' => $date,
            ':heure' => $heure,
            ':nombre' => $nombres,
            ':notes' => $notes
        ]);

       /* // ✅ Redirection vers la page de confirmation
        header('Location: index.php?action=confirmation');
        exit;*/

    } catch (PDOException $e) {
        echo "Erreur lors de l'enregistrement : " . $e->getMessage();
    }
} else {
    echo "Méthode non autorisée.";
}
}