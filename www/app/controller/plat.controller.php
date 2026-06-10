<?php

require_once 'app/controller/controller.php';
require_once 'app/model/carte.model.php';
require_once 'app/model/model.php';

/**
 * controller en charge de la génération de la page d'accueil
 *
 * @return void
 */

function generatePlatPage() {
    $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
    if ($id === null) {
        $_SESSION['FLASH'] = 'ID non trouvé';
        header('Location: index.php?route=error');
        exit();
    }else{
        $data = [
            'Plat' => getPlat($id),
            'css' => 'plat.css',
            'js'=> "plat.js",
            'page_title' => "",
            'view' => 'app/view/plat.view.php',
            'layout' => 'app/view/common/layout.php',
        ];
        generatePage($data);
    }
} 