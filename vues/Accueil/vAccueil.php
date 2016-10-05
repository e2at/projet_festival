<?php

include ("includes/_debut.inc.php");

?>
     <div class="container">
          <div class="jumbotron">
        <p>Cette application web permet de gérer l'hébergement des groupes de musique 
         durant le festival Folklores du Monde.</p>
        <p>
        <hr>
        <h5>Elle offre les services suivants :</h5>
         <div class="row">
        <div class="col-lg-6">
          <p>Consulter, créer, modifier ou supprimer des établissements acceptant d'héberger les groupes de musiciens. </p>
          <p><a class="btn btn-primary" href="cGestionEtablissements.php" role="button">Accéder à la page</a></p>
        </div>
        <div class="col-lg-5">
          <p>Consulter, créer, modifier ou supprimer des caractéristiques de chambres. </p>
          <p><a class="btn btn-primary" href="cGestionTypesChambres.php" role="button">Accéder à la page</a></p>
        </div>
        <div class="col-lg-6">
          <p>Consulter, déclarer ou modifier les capacités d'accueil des établissements. </p>
          <p><a class="btn btn-primary" href="cOffreHebergement.php" role="button">Accéder à la page</a></p>
        </div>
        <div class="col-lg-5">
          <p>Consulter, réaliser ou modifier les attributions des chambres aux groupes dans les établissements. </p>
          <p><a class="btn btn-primary" href="cAttributionChambres.php" role="button">Accéder à la page</a></p>
        </div>
      </div>
      </div>
    </div> <!-- Container -->
    <?php

include ("includes/_fin.inc.php");

?>