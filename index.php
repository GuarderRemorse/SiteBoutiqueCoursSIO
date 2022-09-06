<?php
session_start();

ob_start();

require_once("config/chemins.class.php");
require_once(Chemins::CONFIGS . "mysql_config.class.php");
require_once(Chemins::CONFIGS . "Variables_Globales.class.php");
// require_once(Chemins::libs . "Panier.class.php")

require_once(Chemins::MODELES . "modelePDO.class.php");
require_once(Chemins::MODELES . "gestionboutique.class.php");

require_once(Chemins::VUES_PERMANENTES . "header.inc.php");

require_once(Chemins::CONTROLEURS . "ControleurCategories.class.php");

$controleurCategorie = new ControleurCategories();
$controleurCategorie->afficher();

if (!isset($_REQUEST['controleur'])) {
    require_once(Chemins::VUES . "accueil.inc.php");
} else {
    $action = $_REQUEST['action'];

    $classeControleur = 'Controleur' . $_REQUEST['controleur'];
    $fichierControleur = $classeControleur . ".class.php";
    require_once(Chemins::CONTROLEURS . $fichierControleur);

    $objetControleur = new $classeControleur();
    $objetControleur->$action();
}

// require_once(Chemins::VUES_PERMANENTES . "resume_Panier.inc.php");

require_once(Chemins::VUES_PERMANENTES . "footer.inc.php");
?>