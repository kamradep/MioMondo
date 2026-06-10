<?php
require_once 'app/controller/controller.php';
require_once 'app/model/admin.model.php';
require_once 'app/model/model.php';

function generateLogPage() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $error = '';
    
    // Vérifier si l'utilisateur est bloqué
    if (isset($_SESSION['login_blocked_until'])) {
        if (time() < $_SESSION['login_blocked_until']) {
            $remaining_time = ceil(($_SESSION['login_blocked_until'] - time()) / 60);
            $error = "Trop de tentatives de connexion. Veuillez réessayer dans $remaining_time minutes.";
        } else {
            // Le temps de blocage est écoulé, on réinitialise
            unset($_SESSION['login_blocked_until']);
            $_SESSION['login_attempts'] = 0;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && (!isset($_SESSION['login_blocked_until']) || time() >= $_SESSION['login_blocked_until'])) {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        
        $pdo = getDatabaseConnexion();
        
        if (empty($username) || empty($password)) {
            $error = 'Tous les champs sont obligatoires';
            incrementLoginAttempts();
        } elseif (verifyUserCredentials($username, $password) == true) {
            // Réinitialiser les tentatives après une connexion réussie
            $_SESSION['login_attempts'] = 0;
            unset($_SESSION['login_blocked_until']);
            
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            header('Location: bigdeadminMioMondo.php?route=dashboard');
            exit;
        } else {
            $error = 'Identifiants incorrects';
            incrementLoginAttempts();
        }
    }

    $data = [
        'error' => $error,
        'css' => 'login.css',
        'js' => 'login.js',
        'page_title' => 'Connexion Admin',
        'view' => 'app/view/login.view.php',
        'layout' => 'app/view/common/layout.php',
    ];
    
    generatePage($data);
}

function incrementLoginAttempts() {
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
    }
    
    $_SESSION['login_attempts']++;
    
    // Bloquer après 3 tentatives pendant 3 minutes
    if ($_SESSION['login_attempts'] >= 3) {
        $_SESSION['login_blocked_until'] = time() + 180; // 3 minutes = 180 secondes
    }
}