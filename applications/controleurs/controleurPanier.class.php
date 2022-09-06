<?php

class ControleurPanier {

    public function __construct() {
        
    }

    public function afficherPanier() {
        VariablesGlobales::$lesProduits = Panier::getProduits();
        require chemins::VUES_PERMANENTES . "panier.inc.php";
    }

    public function ajouterProduitPanier() {
        Panier::ajouterProduit($_REQUEST['produit'], 1);
        require chemins::CONTROLEURS . 'controleurProduits.class.php';
        $controleurPanier = new ControleurPanier();
        $controleurPanier->afficherPanier();
    }

    public function supprimerProduitPanier() {
        Panier::retirerProduit($_REQUEST['produit'], 1);
        require chemins::CONTROLEURS . 'controleurProduits.class.php';
        $controleurPanier = new ControleurPanier();
        $controleurPanier->afficherPanier();
    }

}
