<?php include("_onglets.inc.php"); ?>
<!DOCTYPE html">
<html lang="fr">
    <head>
        <title>Festival</title>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="css/cssGeneral.css" rel="stylesheet" type="text/css">
        
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    </head>
    <body class='basePage'>
        <!--  Tableau contenant le titre et les menus -->
        <table width="100%" cellpadding="0" cellspacing="0">
            <!-- Titre -->
            <tr> 
                <td class="titre">
                    <span id="texteNiveau2" class="texteNiveau2">
                        H&eacute;bergement des groupes</span><br>&nbsp;
                </td>
            </tr>
            <!-- Menus -->
            <div class="container">
      <nav class="navbar navbar-default" style="margin-top: 3%;">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Festival Folklores du Monde</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                            <?php construireMenu("Accueil", "index.php"); ?>
                            <?php construireMenu("Gestion établissements", "cGestionEtablissements.php"); ?>
                            <?php construireMenu("Gestion types chambres", "cGestionTypesChambres.php"); ?>
                            <?php construireMenu("Offre hébergement", "cOffreHebergement.php"); ?>
                            <?php construireMenu("Attribution chambres", "cAttributionChambres.php"); ?>
            </ul>
          </div>
        </div>
      </nav>
            <!-- Fin des menus -->
            <tr>
                <td class="basePage">
                    <br><center><br>


