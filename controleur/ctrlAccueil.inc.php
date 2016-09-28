<?php
// TEST 
use modele\Connexion;
use modele\dao\CategorieDao;
use vue\VueAccueil;
use modele\metier\Categorie;

require_once("./includes/fonctions.inc.php");

$pdo = Connexion::connecter();
if ($pdo) {
    $listeCateg = CategorieDao::getAll();
}
Connexion::deconnecter();

/* @var $maVue vue\VueAccueil */
$maVue = new VueAccueil();
$maVue->setTitre('La fleur and co - test');
$maVue->setCentre(__DIR__.'/../vue/vueCentreAccueil.inc.php');
$maVue->setImage('./vue/images/accueil.jpg');
$maVue->setCss('./vue/css/styleLargeurFixe.css');
$maVue->setListeCateg($listeCateg);

$maVue->afficher();
?>
