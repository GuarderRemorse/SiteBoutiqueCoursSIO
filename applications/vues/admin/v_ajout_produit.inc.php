<section>
    <form method="post" action="index.php?controleur=admin&action=ajouterProduit">
        <fieldset>
            <legend>Ajouter un produit</legend>
            <h1>Nom</h1>
            <input type="text" id="nom" name="nom" value="" size="50" />
            <h1>Description</h1>
            <textarea id="description" name="description" size="1024">Rentrer la description du produit</textarea>
            <h1>Prix</h1>
            <input type="text" name="prix" value="0.00" />€
            <h1>Image</h1>
            <input type="file" name="image" value="" />
            <h1>Catégorie</h1>
            <?php
            foreach (VariablesGlobales::$lesCategories as $uneCategorie) {
                ?>
                <div>
                    <input type="radio" value="<?php echo $uneCategorie->id; ?>" name="id" id="<?php echo $uneCategorie->id; ?>" />
                    <label for='<?php echo $uneCategorie->id; ?>'><?php echo str_replace('_', ' ', $uneCategorie->libelle); ?></label>
                </div>
                <?php
            }
            ?>
            <input type="submit" value="Ajouter le produit" />
            
            </legend>
        </fieldset>
    </form>
    <a href="index.php?controleur=admin&action=afficherAdminProduits"><input type="submit" value="Annuler" /><a />
</section>