<?php

include("includes/_debut.inc.php");

// SUPPRIMER LE TYPE DE CHAMBRE SÉLECTIONNÉ

$id = $_REQUEST['id'];  // Non obligatoire mais plus propre
echo "
<br><center><span style=\"color:white;\">Voulez-vous vraiment supprimer le type de chambre $id ?</span>
<h3><br>
<a href='cGestionTypesChambres.php?action=validerSupprimerTypeChambre&id=$id'class=\"btn btn-primary\">
Oui</a>&nbsp; &nbsp; &nbsp; &nbsp;
<a href='cGestionTypesChambres.php'class=\"btn btn-danger\">Non</a></h3></center>";

include("includes/_fin.inc.php");

