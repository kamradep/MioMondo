<?php
require_once 'app/controller/controller.php';

function generateMentionsPage() {
    $data = [
        'css' => 'legal.css',
        'page_title' => 'Mentions légales - Mio Mondo',
        'view' => 'app/view/mentionsLegales.view.php',
        'layout' => 'app/view/common/layout.php',
    ];
    
    generatePage($data);
}