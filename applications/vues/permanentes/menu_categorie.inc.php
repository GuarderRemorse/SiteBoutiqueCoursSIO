<nav class="menu-categ">
    <div class="des-categ">
        <ul>
            <?php
            $lesCategories = GestionBoutique::getLesCategories();
            foreach ($lesCategories as $uneCategorie) {
            ?><div class="container-categ">
                    <img src="<?php echo Chemins::IMAGES_CATEGORIE . "$uneCategorie->image_categ" ?>" alt="Avatar" class="image-categ" />
                    <div class="middle-categ">
                        <div class="text-categ">
                        <a href=index.php?controleur=Produits&action=afficherProduitsCategorie&categorie=<?php echo $uneCategorie->libelle; ?>><?php echo str_replace('_', ' ', $uneCategorie->libelle); ?></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>