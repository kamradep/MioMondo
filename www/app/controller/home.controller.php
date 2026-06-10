<?php

require_once 'app/controller/controller.php';
require_once 'app/model/model.php';

/**
 * controller en charge de la génération de la page d'accueil
 *
 * @return void
 */

function generateHomePage(){
    $data = [
        'css' => 'home.css',
        'js' => 'home.js',
        'page_title' => "Mio Mundo",
        'view' => 'app/view/home.view.php',
        'layout' => 'app/view/common/layout.php',
    ];

    generatePage($data);
}