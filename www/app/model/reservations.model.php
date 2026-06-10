
<?php

function getALLReservations() {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM reservations ORDER BY date DESC";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchALL();
}