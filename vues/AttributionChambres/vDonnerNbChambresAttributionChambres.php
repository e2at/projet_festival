<?php
use \modele\dao\GroupeDAO;
use modele\dao\Bdd;

require_once __DIR__ . '/../../includes/autoload.php';
Bdd::connecter();

include("includes/_debut.inc.php");

// SÉLECTIONNER LE NOMBRE DE CHAMBRES SOUHAITÉES

echo "
<form method='POST' action='cAttributionChambres.php'>
   <input type='hidden' value='validerModifierAttrib' name='action'>
   <input type='hidden' value='$idEtab' name='idEtab'>
   <input type='hidden' value='$idTypeChambre' name='idTypeChambre'>
   <input type='hidden' value='$idGroupe' name='idGroupe'>";
$nomGroupe = GroupeDAO::getOneById($idGroupe)->getNom();

echo "
   <br><center><span style=\"color:white;\">Combien de chambres de type $idTypeChambre souhaitez-vous pour le 
   groupe $nomGroupe ?</span>";
echo "<br><br><br>";

echo "<select name='nbChambres'>";
for ($i = 0; $i <= $nbChambres; $i++) {
    echo "<option>$i</option>";
}
echo "</select></center>";
echo "<br>";
echo "<input type='submit' class=\"btn btn-success\" value='Valider' name='valider'>
   <br><br>
   <a class=\"btn btn-info\" href='cAttributionChambres.php?action=demanderModifierAttrib'>Retour</a>
</form>";

include("includes/_fin.inc.php");

