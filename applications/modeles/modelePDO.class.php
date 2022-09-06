<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelePDO
 *
 * @author baptiste.berouila
 */
class ModelePDO {

    //Attributs utiles pour la connexion
    protected static $serveur = Mysql_Config::SERVEUR;
    protected static $base = Mysql_Config::BASE;
    protected static $utilisateur = Mysql_Config::UTILISATEUR;
    protected static $passe = Mysql_Config::MOT_DE_PASSE;
//Attributs utiles pour la manipulation PDO de la BD
    protected static $pdoCnxBase = null;
    protected static $pdoStResults = null;
    protected static $requete = "";
    protected static $resultat = null;

    protected static function seConnecter() {
        if (!isset(self::$pdoCnxBase)) { //S'il n'y a pas encore eu de connexion
            try {
                self::$pdoCnxBase = new PDO('mysql:host=' . self::$serveur . ';dbname=' . self::$base, self::$utilisateur, self::$passe);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$pdoCnxBase->query("SET CHARACTER SET utf8"); //méthode de la classe PDO
            } catch (Exception $e) {
                echo 'Erreur : ' . $e->getMessage() . '<br />'; // méthode de la classe Exception
                echo 'Code : ' . $e->getCode(); // méthode de la classe Exception
            }
        }
    }

    protected static function seDeconnecter() {
        self::$pdoCnxBase = null;
// Si on n'appelle pas la méthode, la déconnexion a lieu en fin de script
    }

    protected static function getLesTuples($table) {
        self::seConnecter();
        self::$requete = "SELECT * FROM " . $table;
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }

    protected static function getPremierTupleByChamp($table, $nomChamp, $valeurChamp) {
        self::seConnecter();
        self::$requete = "SELECT * FROM " . $table . " WHERE " . $nomChamp . " = :valeurChamp";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue(':valeurChamp', $valeurChamp);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return self::$resultat; //un seul tuple retourné : utilisation de fetch()
    }

    public static function supprimerTuple($table, $nomChamp, $valeurChamp) {
        self::seConnecter();
        self::$requete = "DELETE FROM `$table` WHERE $table.$nomChamp = '$valeurChamp'";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
    }

    protected static function getNbTupleByTable($table) {
        self::seConnecter();
        self::$requete = "SELECT Count(*) AS nbTuples FROM $table";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        return self::$resultat->nbTuples;
    }

    protected static function updateTable($table, $nomChamp1, $valeurChamp1, $nomChamp2, $valeurChamp2) {
        self::seConnecter();
        self::$requete = "UPDATE $table SET $nomChamp1 = '$valeurChamp1' Where $table.$nomChamp2=$valeurChamp2";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);

        self::$pdoStResults->execute();
    }

    protected static function ajouterValeurbyTable($table, $valeur, $valeurChamp = array()) {
        self::seConnecter();
        self::$requete = "insert into $table($valeur) values($valeurChamp)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);

        self::$pdoStResults->execute();
    }

}
