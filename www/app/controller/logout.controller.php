<?php
function processLogout() {
    // Détruire complètement la session
    $_SESSION = array();

    // Si vous voulez détruire le cookie de session
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finalement, détruire la session
    session_destroy();

    // Rediriger vers la page de login
    header("Location: bigdeadminMioMondo.php?route=log");
    exit;
}