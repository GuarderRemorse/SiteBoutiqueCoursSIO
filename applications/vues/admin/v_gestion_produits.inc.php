<section>

    <div class="titre">
        Gestion des produits (Accès réservé)</br>
        - Bonjour <?php echo $_SESSION['login_admin']; ?> -
    </div>    

    <p>
    <table border="1">
        <thead>
            <tr>
                <th width="15%">Nom</th>
                <th width="30%">Description</th>
                <th width="10%">Prix</th>
                <th width="25%">Image</th>
                <th width="20%">Categorie</th>
            </tr>

            <?php
            foreach (GestionBoutique::getLesProduitsAdmin() as $uneCategorie) {
//            $unProduit = GestionBoutique::getProduitById($idProduit);
                ?>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $uneCategorie->nom; ?></td>
                    <td><?php echo $uneCategorie->description; ?></td>
                    <td><?php echo $uneCategorie->prix; ?>€</td>
                    <!--<td>image.exe</td>-->
                    <td><img src="<?php echo Chemins::IMAGES_PRODUITS . $uneCategorie->libelle . "/" . $uneCategorie->image; ?>" alt="photo" width="75%" /></td>
                    <td><?php echo str_replace('_', ' ', $uneCategorie->libelle); ?></td>
                </tr>
            </tbody>

            <?php
        }
        ?>
    </table>
</p>
<a href="index.php?controleur=admin&action=afficherIndexAdmin"><input type="submit" value="Retourner à la partie admin" name="return" /></a>
<a href="index.php?controleur=admin&action=afficherAjouterProduit"><input type="submit" value="Ajouter un produit" name="return" /></a>
</section>