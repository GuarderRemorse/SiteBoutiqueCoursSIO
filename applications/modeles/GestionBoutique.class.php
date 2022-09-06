<?php

// Inclusion de la classe MysqlConfig
// à partir de l'emplacement actuel (dossier "modeles")
//require_once '../../configs/mysql_config.class.php';

/**
 * Classe utilitaire de gestion de la Base de Données
 *
 * @author OALBERT
 */
class GestionBoutique extends ModelePDO {

    /**
     * Retourne la liste des Catégories
     * @return type Tableau d'objets
     */
    public static function getLesCategories() {
        return self::getLesTuplesByTable("Categorie");
    }

    /**
     * Retourne la liste des Produits
     * @return type Tableau d'objets
     */
    public static function getLesProduits() {
        return self::getLesTuplesByTable("Produit");
    }

    /**
     * Retourne la liste des produits d'une catégorie donnée
     * @param type $libelleCategorie Libellé de la catégorie
     * @return type
     */
    public static function getLesProduitsByCategorie($libelleCategorie) {
        self::seConnecter();

        self::$requete = "SELECT P.id, nom, description, prix, image, libelle FROM Produit P,Categorie C where P.idCategorie = C.id AND libelle = :libCateg";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('libCateg', $libelleCategorie);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    /**
     * Vérifie si l'utilisateur est un administrateur présent dans la base
     * @param type $login Login de l'utilisateur
     * @param type $passe Passe de l'utilisateur
     * @return type Booléen
     */
    public static function isAdminOK($login, $passe) {
        self::seConnecter();

        self::$requete = "SELECT * FROM Utilisateur where login=:login and passe=:passe";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->bindValue('passe', sha1($passe));
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        if ((self::$resultat != null) and ( self::$resultat->isAdmin))
            return true;
        else
            return false;
    }

    /**
     * Retourne LE produit dont l'id est passé en paramètre
     * @param type $idProduit id du produit
     * @return type
     */
    public static function getProduitById($idProduit) {
        self::seConnecter();
        self::$requete = "SELECT P.id, P.nom, P.description, P.image, P.prix, C.libelle FROM Produit P,categorie C WHERE P.id = :idProd and P.idCategorie = C.id ";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idProd', $idProduit);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }

    public static function getNbProduits() {
        self::seConnecter();

        //self::$requete = "SELECT Count(*) FROM Produit";
        self::$requete = "SELECT Count(*) AS nbProduits FROM Produit";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        //return self::$resultat;
        return self::$resultat->nbProduits;
    }

    /**
     * Ajoute une ligne dans la table Catégorie     
     * @param type $libelleCateg Libellé de la Catégorie
     */
    public static function ajouterCategorie($libelleCateg) {

        self::seConnecter();

        self::$requete = "insert into Categorie(libelle) values(:libelle)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('libelle', $libelleCateg);
        self::$pdoStResults->execute();
    }

    private static function getLesTuplesByTable($table) {
        self::seConnecter();

        self::$requete = "select * from $table";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    private static function getLeTupleTableById($table, $id) {
        self::seConnecter();

        self::$requete = "select * from $table where id=:idTable";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('idTable', $id);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getLesProduitsAdmin() {
        self::seConnecter();

        self::$requete = "SELECT P.id, nom, description, prix, image, libelle FROM Produit P, Categorie C where P.idCategorie = C.id";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getLesCategoriesAdmin() {
        self::seConnecter();

        self::$requete = "SELECT id, libelle FROM Categorie";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function ajoutProduitAdmin($nom, $description, $prix, $image, $idCat) {
        self::seConnecter();

        self::$requete = "insert into Produit (nom, description, prix, image, idCategorie) values ('$nom','$description','$prix','$image','$idCat');";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);

        self::$pdoStResults->execute();
    }

    public static function supprimerCategorieAdmin($id) {
        self::seConnecter();

        self::$requete = "delete from Categorie where id='$id'";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);

        self::$pdoStResults->execute();
    }
    
    public static function modifierCategorieAdmin($libelle,$id) {
        self::seConnecter();

        self::$requete = "UPDATE categorie SET libelle = '$libelle' WHERE id='$id'";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);

        self::$pdoStResults->execute();
    }

}
?>