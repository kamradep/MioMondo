<?php
session_start();

require_once 'config.php';
require_once 'app/controller/controller.php';
require_once 'app/model/model.php';

// Routes protégées
$protectedRoutes = ['dashboard', 'plats'];

$route = 'log';
if (!empty($_GET['route'])) {
    $route = $_GET['route'];
}

// Vérification des accès
if (in_array($route, $protectedRoutes) && empty($_SESSION['logged_in'])) {
    header('Location: bigdeadminMioMondo.php?route=log');
    exit;
}

switch ($route) {
    case 'log':
        require_once 'app/controller/log.controller.php';
        generateLogPage();
        break;
        
    case 'dashboard':
        require_once 'app/controller/dashboard.controller.php';
        generateDashboardPage();
        break;
    
    case 'logout':
    require_once 'app/controller/logout.controller.php';
    processLogout();
    break;
           
    exit;
        /*die("Erreur : Page inconnue !")*/;
}


