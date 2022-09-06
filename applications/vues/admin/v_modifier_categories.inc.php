<section>
    <form method="post" action="index.php?controleur=admin&action=modifierCategorie">
        <fieldset>
            <legend>Modifier une catégorie</legend>
            <?php
            foreach (VariablesGlobales::$lesCategories as $uneCategorie) {
                ?>
                <div>
                    <input type="radio" name="id" value="<?php echo $uneCategorie->id; ?>" id="<?php echo $uneCategorie->id; ?>" />
                    <label for='<?php echo $uneCategorie->id; ?>'><?php echo str_replace('_', ' ', $uneCategorie->libelle); ?></label>
                </div>
                <?php
            }
            ?>
            <h1>Nom</h1>
            <input type="text" id="libelle" name="libelle" value="" size="50" />
            <br />
            <input type="submit" value="Modifier la catégorie" />
            </legend>
        </fieldset>
    </form>
    <a href="index.php?controleur=admin&action=afficherAdminCategories"><input type="submit" value="Annuler" /><a />
</section>