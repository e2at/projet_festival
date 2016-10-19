<!DOCTYPE HTML>

<html>

    <head>

        <title>Test DAO</title>
        <meta charset = "UTF-8">

    </head>

    <body>

        <?php
        require_once ("../fonctions.inc.php");

        use modele\metier\Etablissement;
        use modele\metier\Groupe;
        use modele\metier\Offre;
        use modele\metier\TypeChambre;
        use modele\metier\Attribution;
        use modele\dao\EtablissementDAO;

        

Connexion:: seConnecter();

        $etablissement = new Etablissement("0350773A", "Collège Ste Jeanne d'Arc-Choisy", "3, avenue de la Borderie BP 32", 35404, "Paramé", 0299560159, "NULL", 1, "Madame", "Lefort", "Anne");

        $lesEtablissements = EtablissementDAO:: getAll();
        var_dump($lesEtablissements);

        $groupe = new Groupe("g001", "Groupe folklorique du Bachkortostan", "NULL", "NULL", 40, "Bachkirie", 0);

        $lesGroupes = EtablissementDAO:: getAll();
        var_dump($lesGroupes);

        $offre = new Offre("0350773A", "C2", 15);

        $lesOffres = EtablissementDAO:: getAll();
        var_dump($lesOffres);

        $typeChambre = new TypeChambre("C1", "1 lit");

        $lesTypesChambres = EtablissementDAO:: getAll();
        var_dump($lesTypesChambres);

        $attribution = new Attribution("0350773A", "C2", "g004", 2);

        $lesAttributions = EtablissementDAO:: getAll();
        var_dump($lesAttributions);
        ?>

    </body>

</html>