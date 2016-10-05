<?php

// On récupère l'adresseRue de la page
$URL = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];

// Cette fonction est appelée pour la construction de chaque onglet ($i est la 
// position de l'onglet dans la barre)
function construireMenu($nom, $adr) {
    global $URL;

    if(($adr != null) && (strpos($URL,$adr) !== false)) {
        echo '<li class="active"><a href="' . $adr . '">' . $nom . '</a></li>';
    } else {
        echo '<li><a href="' . $adr . '">' . $nom . '</a></li>';
    }
}
