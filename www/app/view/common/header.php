<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIO MONDO - Restaurant Gastronomique</title>
    <meta name="description" content="Restaurant Mio Mondo - Cuisine authentique à Vivier-sur-Mer">
    <meta name="author" content="Mio Mondo">
    <meta name="keywords" content="restaurant, gastronomique, cuisine, Vivier-sur-Mer">
    <link rel="icon" href="public/images/logo.png">
    <link rel="icon" type="image/png" href="public/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="public/css/common/header1.css">
    <link rel="stylesheet" href="public/css/common/footer.css">
    <link rel="stylesheet" href="public/css/<?= $css ?>">  

    <script src="public/js/common/header.js" default></script>
    <script src="public/js/common/footer.js" default></script>
    <script src="public/js/<?= $js ?>" default></script>
    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&family=Grenze+Gotisch:wght@100..900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Lora:ital,wght@0,400..700;1,400..700&family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <div class="header-container">
            <nav class="nav-left nav">
                <a href="index.php?route=home#histoire">Restaurant</a>
                <a href="#">Café</a>
                <a href="index.php?route=home#HORAIRES">horaires</a>
            </nav>
            
            <div class="logo">
                <a href="index.php"><img src="public/images/logo.png" alt="Restaurant Logo"></a>
            </div>
            
            <nav class="nav-right nav">
                <a href="">Galerie</a>
                <a href="index.php?route=carte">Carte</a>
                <a href="index.php?route=reservation">Réservation</a>
            </nav>
            
            <a href="tel:+33223176446"><div class="phone-number">02 23 17 64 46</div></a>
            
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        
        <div class="mobile-menu">
            <a href="index.php?route=home#histoire">Restaurant</a>
            <a href="#">Café</a>
            <a href="index.php?route=home#HORAIRES">horaires</a>
            <a href="#">Galerie</a>
            <a href="index.php?route=carte">Carte</a>
            <a href="index.php?route=reservation">Réservation</a>
        </div>
        
        <div class="overlay"></div>
    </header>
