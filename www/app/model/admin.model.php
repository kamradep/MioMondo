<?php
function verifyUserCredentials(string $username, string $password): bool {
    $pdo = getDatabaseConnexion();

    $stmt = $pdo->prepare("SELECT id FROM administrateurs WHERE username = ? AND password_hash = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    return $user !== false;
}
