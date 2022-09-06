<!-- CORPS de la page-->
<div class="produit">
    <section>

        <?php
        foreach (VariablesGlobales::$lesProduits as $uneCategorie) {
            //        var_dump($unProduit)
        ?>
            <article>
                <aside class="image-p">
                    <img src="<?php echo Chemins::IMAGES_PRODUITS . VariablesGlobales::$libelleCategorie . "/" . $uneCategorie->image; ?>" alt="photo" />
                </aside>
                <aside class="desc-p">
                    <div class="titre"><?php echo $uneCategorie->nom; ?></div>
                    <div class="desc"><?php echo $uneCategorie->description; ?></div>
                    <div class="libelle"><?php echo str_replace('_', ' ', $uneCategorie->libelle); ?></div>
                    <!--<p>(<?php echo str_replace('_', ' ', VariablesGlobales::$libelleCategorie); ?>)</p>-->
                    <div class="prix"><?php echo $uneCategorie->prix; ?>€</div>
                    <div class="ajout-panier">
                        <a href="index.php?controleur=panier&action=ajouterProduitPanier&produit=<?php echo $uneCategorie->id; ?>&categorie=<?php echo VariablesGlobales::$libelleCategorie; ?>">
                            <i class="fa-solid fa-cart-arrow-down fa-2xl"></i>
                        </a>
                    </div>
                </aside>
            </article>
        <?php
        }
        ?>
    </section>
</div>