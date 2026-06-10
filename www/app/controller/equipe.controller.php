<?php

require_once 'app/controller/controller.php';
require_once 'app/model/equipe.model.php';
require_once 'app/model/model.php';

/**
 * controller en charge de la génération de la page d'accueil
 *
 * @return void
 */

function generateEquipePage(){
    $data = [
        'equipes' => getALLEquipeMMI(),
        'GB' => getALLEquipeGB(),
        'css' => 'equipe.css',
        'page_title' => "Equipe HibisKiss",
        'view' => 'app/view/equipe.view.php',
        'layout' => 'app/view/common/layout.php',
    ];

    generatePage($data);
}