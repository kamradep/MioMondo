<?php

require_once 'app/controller/controller.php';

function generateConfidentialitePage() {
    $data = [
        'css' => 'legal.css',
        'page_title' => 'Politique de confidentialité - Mio Mondo',
        'view' => 'app/view/confidentialite.view.php',
        'layout' => 'app/view/common/layout.php',
    ];
    
    generatePage($data);
}