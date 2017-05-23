<?php

use modele\dao\AttributionDAO;
use modele\metier\Attribution;
require_once __DIR__.'/includes/autoload.php';

include("includes/_gestionErreurs.inc.php");
//include("includes/gestionDonnees/_connexion.inc.php");
//include("includes/gestionDonnees/_gestionBaseFonctionsCommunes.inc.php");
//include("includes/gestionDonnees/_gestionBaseFonctionsGestionAttributions.inc.php");

// 1ère étape (donc pas d'action choisie) : affichage du tableau des 
// attributions en lecture seule
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'initial';
}

$action = $_REQUEST['action'];

// Aiguillage selon l'étape
switch ($action) {
    case 'initial':
        include("vues/AttributionChambres/vConsulterAttributionChambres.php");
        break;

    case 'demanderModifierAttrib':
        include("vues/AttributionChambres/vModifierAttributionChambres.php");
        break;

    case 'donnerNbChambres':
        $idEtab = $_REQUEST['idEtab'];
        $idTypeChambre = $_REQUEST['idTypeChambre'];
        $idGroupe = $_REQUEST['idGroupe'];
        $nbChambres = $_REQUEST['nbChambres'];
        include("vues/AttributionChambres/vDonnerNbChambresAttributionChambres.php");
        break;

    case 'validerModifierAttrib':
        $idEtab = $_REQUEST['idEtab'];
        $idTypeChambre = $_REQUEST['idTypeChambre'];
        $idGroupe = $_REQUEST['idGroupe'];
        $nbChambres = $_REQUEST['nbChambres'];
        $lgAttrib = AttributionDAO::obtenirNbAttribGrp($idEtab, $idTypeChambre, $idGroupe, $nbChambres);
        $id = array('idEtab' => $idEtab, 'idTypeChambre' => $idTypeChambre, 'idGroupe' => $idGroupe);
        $objet = new Attribution($idEtab, $idTypeChambre, $idGroupe, $nbChambres);
        if ($nbChambres == 0) {
            AttributionDAO::delete($id);
        } else {
            if ($lgAttrib != 0) {
                AttributionDAO::update($id, $objet);
            } else {
                AttributionDAO::insert($objet);
            }
        }
        include("vues/AttributionChambres/vModifierAttributionChambres.php");
        break;
}

// Fermeture de la connexion au serveur MySql
$connexion = null;


