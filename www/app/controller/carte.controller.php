<?php

require_once 'app/controller/controller.php';
require_once 'app/model/carte.model.php';
require_once 'app/model/model.php';

/**
 * controller en charge de la génération de la page d'accueil
 *
 * @return void
 */

function generateCartePage(){
    $data = [
        //'css' => 'carte.css',
        'css' => 'carte2.css',
        'js' => 'carte.js',
        'plats' => getALLPlats(),
        'PlatMenu' => getPlatMenu(),
        'PlatEntrée' => getPlatEntrée(),
        'PlatFruit' => getPlatFruit(),
        'PlatPinsa' => getPlatPinsa(),
        'PlatPlat' => getPlatPlat(),
        /**Dessert**/
        'Desserts' => getDessert(),
        /**Boissons**/
        'Apéritifs' => getApéritifs(),
        'BoissonChaudes' => getBoissonChaude(),
        'Vins' => getVin(),

        'page_title' => "Mio Mundo",
        //'view' => 'app/view/carte.view.php',
        'view' => 'app/view/carte.viewPDF.php',

        'layout' => 'app/view/common/layout.php',
    ];
    
    generatePage($data);
}