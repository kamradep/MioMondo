<?php
session_start();

require_once 'config.php';
require_once 'app/model/model.php';
require_once 'app/controller/controller.php';



$route='home';
if (!empty($_GET['route'])) {
    $route=$_GET['route'];
}


switch ($route) {
    case 'home':
        
        require_once ('app/controller/home.controller.php');
        generateHomePage();
        
    break;
    case 'carte':
        
        require_once ('app/controller/carte.controller.php');
        generateCartePage();
        
    break;
    case 'reservation':
        
        require_once ('app/controller/reservation.controller.php');
        generateReservationPage();
        
    break;
    case 'plat':
        
        require_once ('app/controller/plat.controller.php');
        generatePlatPage();
        
    break;
    /*case 'sendMail':
        
        require_once ('app/controller/fonction.controller.php');
        SendMailFonction();
        
    break;*/
    case 'submitReservation':
        
        require_once ('app/controller/submitReservation.controller.php');
        SubmitReservation();
        
    break;


    case 'mentions-legales':
        require_once ('app/controller/mentionsLegales.controller.php');
        generateMentionsPage();
    break;
    
    case 'confidentialite':
        require_once ('app/controller/confidentialite.controller.php');
        generateConfidentialitePage();
    break;
    
    case 'error':
            require_once ('app/controller/error.controller.php');
            generateErrorPage();
    default:
    exit;
        /*die("Erreur : Page inconnue !")*/;
}


