<main>
        <div class="margin">
            <!-- Images décoratives -->
            <div class="deco-image deco-1"></div>
            <div class="deco-image deco-2"></div>
            <div class="deco-image deco-3"></div>
            <div class="deco-image deco-4"></div>

            <div class="container">
                <div class="decoplat-1"></div>
                <div class="decoplat-2"></div>
                <div class="decoplat-3"></div>
                <div class="decoplat-4"></div>

                <h1 class="animate-item">MIO MONDO</h1>

                <!-- Menus Spéciaux -->
                <div class="special-menus animate-item">
                    <?php foreach ($PlatMenu as $Menu):?>
                        <div class="special-menu item">
                        <div class="special-menu-title item"><?= $Menu['nom'] ?></div>
                        <div class="special-menu-content item">
                            <?= $Menu['ingredients'] ?>

                            - DESSERT -
                        </div>
                        <div class="special-menu-price item" ><?= $Menu['prix'] ?></div>
                    </div>
                <?php endforeach; ?>
                    
                </div>

                <div class="colonnes"> 
                    <!-- Entrées -->
                    <section class="menu-section animate-item">
                        <h2 class="animate-item">- ENTRÉES -</h2>
                        
                        <?php foreach ($PlatEntrée as $Entrée):?>
                    <!-- <a href="index.php?route=plat&id=<?= $Entrée['id'] ?>"> -->
                        <div class="menu-item animate-item item">
                            <div class="menu-item-name item"><?= $Entrée['nom'] ?></div>
                            <div class="menu-item-price item"><?= $Entrée['prix'] ?></div>
                        </div>
                    <!-- </a> -->
                <?php endforeach; ?>

                    </section>
                    
                    <!-- Fruits de mer -->
                    <section class="menu-section animate-item">
                        <h2 class="animate-item">- FRUITS DE MER -</h2>
                        
                        <?php foreach ($PlatFruit as $Fruit):?>
                    <!-- <a href="index.php?route=plat&id=<?= $Fruit['id'] ?>"> -->
                        <div class="menu-item animate-item">
                            <div class="menu-item-name"><?= $Fruit['nom'] ?></div>
                            <div class="menu-item-desc"><?= $Fruit['ingredients'] ?></div>
                            <div class="menu-item-price"><?= $Fruit['prix'] ?></div>
                        </div>
                    <!-- </a> -->
                <?php endforeach; ?>
                        
                    </section>
                    
                    <!-- Plats -->
                    <section class="menu-section animate-item">
                        <h2 class="animate-item">- PLATS -</h2>
                        
                         <?php foreach ($PlatPlat as $Plat):?>
                    <!-- <a href="index.php?route=plat&id=<?= $Plat['id'] ?>"> -->
                        <div class="menu-item animate-item">
                            <div class="menu-item-name"><?= $Plat['nom'] ?></div>
                            <div class="menu-item-desc"><?= $Plat['ingredients'] ?></div>
                            <div class="menu-item-price"><?= $Plat['prix'] ?></div>
                        </div>
                    <!-- </a> -->
                <?php endforeach; ?>
                    </section>
                    
                    <!-- Pinsa -->
                    <section class="menu-section animate-item">
                        <h2 class="animate-item">- PINSA -</h2>
                        
                         <?php foreach ($PlatPinsa as $Pinsa):?>
                            <!-- <a href="index.php?route=plat&id=<?= $Pinsa['id'] ?>"> -->
                            <div class="menu-item animate-item">
                                <div class="menu-item-name"><?= $Pinsa['nom'] ?></div>
                                <div class="menu-item-desc"><?= $Pinsa['ingredients'] ?></div>
                                <div class="menu-item-price"><?= $Pinsa['prix'] ?></div>
                            </div>
                            <!-- </a> -->
                        <?php endforeach; ?>
                    </section>
                    
                    <!-- DESSERTS -->
                    <section class="menu-section animate-item">
                        <h2 class="animate-item">- DESSERTS -</h2>
                        
                        <?php foreach ($Desserts as $Dessert):?>
                            <!-- <a href="index.php?route=plat&id=<?= $Dessert['id'] ?>"> -->
                            <div class="menu-item animate-item">
                                <div class="menu-item-name"><?= $Dessert['nom'] ?></div>
                                <div class="menu-item-desc"><?= $Dessert['ingredients'] ?></div>
                                <div class="menu-item-price"><?= $Dessert['prix'] ?></div>
                            </div>
                            <!-- </a> -->
                        <?php endforeach; ?>
                    </section>
                    
                    <!-- BOISSONS -->
                    <section class="menu-section animate-item">
                        <h2 class="animate-item">- BOISSONS -</h2>
                        
                        <h3 class="animate-item">Apéritifs</h3>
                        <?php foreach ($Apéritifs as $Apéritif):?>
                            <!-- <a href="index.php?route=plat&id=<?= $Apéritif['id'] ?>"> -->
                            <div class="menu-item animate-item">
                                <div class="menu-item-name"><?= $Apéritif['nom'] ?></div>
                                <div class="menu-item-desc"><?= $Apéritif['ingredients'] ?></div>
                                <div class="menu-item-price"><?= $Apéritif['prix'] ?></div>
                            </div>
                            <!-- </a> -->
                        <?php endforeach; ?>

                        
                        <h3 class="animate-item">Vins</h3>
                        <?php foreach ($Vins as $Vin):?>
                            <!-- <a href="index.php?route=plat&id=<?= $Vin['id'] ?>"> -->
                            <div class="menu-item animate-item">
                                <div class="menu-item-name"><?= $Vin['nom'] ?></div>
                                <div class="menu-item-desc"><?= $Vin['ingredients'] ?></div>
                                <div class="menu-item-price"><?= $Vin['prix'] ?></div>
                            </div>
                            <!-- </a>-->
                        <?php endforeach; ?>

                        
                        <h3 class="animate-item">Boissons chaudes</h3>
                        <?php foreach ($BoissonChaudes as $BoissonChaude):?>
                            <!-- <a href="index.php?route=plat&id=<?= $BoissonChaude['id'] ?>"> -->
                            <div class="menu-item animate-item">
                                <div class="menu-item-name"><?= $BoissonChaude['nom'] ?></div>
                                <div class="menu-item-desc"><?= $BoissonChaude['ingredients'] ?></div>
                                <div class="menu-item-price"><?= $BoissonChaude['prix'] ?></div>
                            </div>
                            <!-- </a> -->
                        <?php endforeach; ?>

                    </section>
                </div>
                <a href="public/document/carte.pdf" download>
                    <div class='pdfcarte'>
                        <p>Télécharger la carte (PDF)</p>
                    </div>
                </a>
            </div>
        </div>
    </main>
   