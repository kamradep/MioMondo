<?php 
/*
    Layout composé d'un header, d'une partie centrale (contenu) et d'un footer


    Include/include_once/require/require_once
*/

// Affichage du header
include 'app/view/common/header.php';
/*include 'app/view/common/popup.html';*/

//Affichage de la vue
echo $content;

//Affichage du footer
include 'app/view/common/footer.php';