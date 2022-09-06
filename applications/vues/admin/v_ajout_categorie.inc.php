<section>
    <form method="post" action="index.php?controleur=admin&action=ajouterCategorie">
        <fieldset>
            <legend>Ajouter une catégorie</legend>
            <h1>Nom</h1>
            <input type="text" id="libelle" name="libelle" value="" size="50" />
            <br />
            <input type="submit" value="Ajouter la catégorie" />
            </legend>
        </fieldset>
    </form>
    <a href="index.php?controleur=admin&action=afficherAdminCategories"><input type="submit" value="Annuler" /><a />
</section>