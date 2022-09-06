<?php

Class ControleurAdmin {

    public function __construct() {
        
    }

    public function afficherIndexAdmin() {
        require(chemins::VUES_ADMIN . "v_connexion.inc.php");
    }

    public function afficherAdminCategories() {
        require(chemins::VUES_ADMIN . "v_gestion_categories.inc.php");
    }

    public function afficherAdminProduits() {
        require(chemins::VUES_ADMIN . "v_gestion_produits.inc.php");
    }

    public function verifierConnexion() {
        if (GestionBoutique::isAdminOK($_POST['login'], $_POST['passe'])) {
            $_SESSION['login_admin'] = $_POST['login'];

            if (isset($_POST['connexion_auto']))
                setcookie('login_admin', $_POST['login'], time() + 60 * 60 * 24 * 30, null, null, false, true);
            // Le cookie sera valable dans ce cas 1 semaine (7 jours)

            require 'indexAdmin.inc.php';
        } else
            require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php';
    }

    public function afficherAjouterProduit() {
        require(chemins::VUES_ADMIN . "v_ajout_produit.inc.php");
    }

    public function ajouterProduit() {
        GestionBoutique::ajoutProduitAdmin($_POST['nom'], $_POST['description'], $_POST['prix'], $_POST['image'], $_POST['categorie']);
        require(chemins::VUES_ADMIN . "v_gestion_produits.inc.php");
    }

    public function ajouterCategorie() {
        GestionBoutique::ajouterCategorie($_POST['libelle']);
        require(chemins::VUES_ADMIN . "v_gestion_categories.inc.php");
    }

    public function supprimerCategorie() {
        GestionBoutique::supprimerCategorieAdmin($_REQUEST['id']);
        require(Chemins::VUES_ADMIN . "v_gestion_categories.inc.php");
    }

    public function modifierCategorie() {
        GestionBoutique::modifierCategorieAdmin($_POST['libelle'], $_POST['id']);
        require(chemins::VUES_ADMIN . "v_gestion_categories.inc.php");
    }

    public function afficherModifierCategorie() {

        require(Chemins::VUES_ADMIN . "v_modifier_categories.inc.php");
    }

    public function afficherAjouterCategorie() {
        require(chemins::VUES_ADMIN . "v_ajout_categorie.inc.php");
    }

}
