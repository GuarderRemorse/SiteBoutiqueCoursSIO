<?php

class Panier {

    public static function initialiser() {
        if (!isset($_SESSION['produits'])) {
            $_SESSION['produits'] = array();
        }
    }

    public static function ajouterProduit($leProduit, $qte) {

        $_SESSION['produits'][$leProduit] = $qte;
    }

    public static function retirerProduit($idProduit) {
        unset($_SESSION['produits'][$idProduit]);
    }

    public static function getProduits() {
        return $_SESSION['produits'];
    }

    public static function getNbProduits() {
        return isset($_SESSION['produits']) ? count($_SESSION['produits']) : 0;
    }

    public static function vider() {
        $_SESSION['produits'] = array();
    }

    public static function detruire() {
        unset($_SESSION['produits']);
    }

    public static function estVide() {
        return (self::getNbProduits() == 0);
    }

    public static function contient($leProduit) {
        return in_array($leProduit, self::getProduits());
    }

}

?>
