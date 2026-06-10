<?php
function getALLPlats() {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM carte";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchALL();
}

function getPlat($id) {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM carte Where id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt-> bindParam(':id', $id , PDO::PARAM_INT);
    $stmt -> execute();
    return $stmt->fetch();
}

function getPlatFruit() {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM carte Where `type` = 'Fruits de mer'";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchALL();
}

function getPlatEntrée() {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM carte Where `type`='Entrée'";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchALL();
}

function getPlatPlat() {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM carte Where `type`='Plat'";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchALL();
}

function getPlatPinsa() {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM carte Where `type`='Pinsa'";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchALL();
}

function getPlatBagel() {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM carte Where `type`='Bagel'";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchALL();
}

function getPlatMenu() {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM carte Where `type` = 'Menu'";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchALL();
}

function getDessert() {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM carte Where `type` = 'Dessert'";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchALL();
}

function getVin() {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM carte Where `type` = 'Vin'";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchALL();
}

function getBoissonChaude() {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM carte Where `type` = 'Boisson chaude'";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchALL();
}

function getApéritifs() {
    $pdo = getDatabaseConnexion();
    $sql = "SELECT * FROM carte Where `type` = 'Apéritifs'";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    return $stmt->fetchALL();
}