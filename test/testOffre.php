<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test classe métier Offre</title>
    </head>
    <body>
        <?php

        use modele\metier\Offre;
        require_once __DIR__ . '/../includes/autoload.php';

        echo "<h2>Test unitaire de la classe métier Offre</h2>";
        $objet = new Offre('7751545A', 'C7', 8);
        var_dump($objet);
        ?>
    </body>
</html>

