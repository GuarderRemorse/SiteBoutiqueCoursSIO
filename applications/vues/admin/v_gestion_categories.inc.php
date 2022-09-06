<section>

    <div class="titre">
        Gestion des catégories (Accès réservé)</br>
        - Bonjour <?php echo $_SESSION['login_admin']; ?> -
    </div>    

    <p>
    <table border="1">
        <thead>
            <tr>
                <th width="100%">Libelle</th>
                <th width="auto">Supprimer</th>
            </tr>

            <?php
            foreach (GestionBoutique::getLesCategoriesAdmin() as $uneCategorie) {
//            $unProduit = GestionBoutique::getProduitById($idProduit);
                ?>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo str_replace('_', ' ', $uneCategorie->libelle); ?></td>
                    <td><a href="index.php?controleur=admin&action=supprimerCategorie&id=<?php echo $uneCategorie->id; ?>">&#128465;</a></td>
                </tr>
            </tbody>

            <?php
        }
        ?>

    </table>
</p>
<a href="index.php?controleur=admin&action=afficherIndexAdmin"><input type="submit" value="Retourner à la partie admin" name="return" /></a>
<a href="index.php?controleur=admin&action=afficherAjouterCategorie"><input type="submit" value="Ajouter une catégorie" name="return" /></a>
<a href="index.php?controleur=admin&action=afficherModifierCategorie"><input type="submit" value="Modifier une catégorie" name="return" /></a>
</section>