<main>
<div class="container" id="main-container">
        <div class="dish-card">
            <div class="dish-image">
                <img src="https://images.unsplash.com/photo-1604909052743-94e838986d24?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Bœuf Bourguignon">
                <div class="dish-badge animate delay-1">Chef's Special</div>
            </div>
            
            <div class="dish-content">
                <div class="dish-header">
                    <h1 class="dish-title animate delay-2"><?= $Plat['nom'] ?></h1>
                    <div class="dish-price animate delay-3"><?= $Plat['prix'] ?>€</div>
                </div>
                
                <div class="dish-description animate delay-3">
                    <p><?= $Plat['description'] ?></p>
                </div>
                
                <div class="dish-section animate delay-4">
                    <div class="section-title">
                        <i class="fas fa-mortar-pestle"></i> Ingrédients
                    </div>
                    <div class="ingredients-grid">
                        <?php
                            $ingredients = $Plat['ingredients']; 
                            $liste = explode(',', $ingredients);    
                        ?>
                            <?php foreach ($liste as $ingredient): ?>
    <div class="ingredient-item">
        <?= htmlspecialchars(ucfirst(trim($ingredient))) ?>
    </div>
<?php endforeach; ?>
                        
                    </div>
                </div>
                
                <div class="dish-section animate delay-5">
                    <div class="section-title">
                        <i class="fas fa-allergies"></i> Allergènes
                    </div>
                    <div class="nutrition-facts">
                        <?php
    $allergenes = $Plat['allergenes']; 
    $liste = explode(',', $allergenes);
?>
                        <?php foreach ($liste as $allergene): ?>
    <div class="nutrition-item">
        <div class="nutrition-value"><?= htmlspecialchars(ucfirst(trim($allergene))) ?></div>
        <div class="nutrition-label">Allergène</div>
    </div>
<?php endforeach; ?>
                        
                    </div>
                </div>
                
                <div class="action-buttons">

                    <div class="animate-item" style="text-align: center;">
                    <a href="index.php?route=carte" class="back-button">Retour à la carte</a>
                </div>
                </div>
            </div>
        </div>
    </div>
    </main>