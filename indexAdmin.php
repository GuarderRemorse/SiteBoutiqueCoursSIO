<?php
session_start();

ob_start();

require_once("config/chemins.class.php");
require_once(Chemins::CONFIGS . "mysql_config.class.php");
require_once(Chemins::CONFIGS . "Variables_Globales.class.php");
// require_once(Chemins::libs . "Panier.class.php")

require_once(Chemins::MODELES . "modelePDO.class.php");
require_once(Chemins::MODELES . "gestionboutique.class.php");

require_once(Chemins::VUES_ADMIN . "header.inc.php");

if (!isset($_REQUEST['controleur'])) {
    require_once(Chemins::VUES_ADMIN . "v_connexion.inc.php");
} else {
    $action = $_REQUEST['action'];

    $classeControleur = 'Controleur' . $_REQUEST['controleur'];
    $fichierControleur = $classeControleur . ".class.php";
    require_once(Chemins::CONTROLEURS . $fichierControleur);

    $objetControleur = new $classeControleur();
    $objetControleur->$action();
}

?>