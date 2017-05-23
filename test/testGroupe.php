<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Groupe Test</title>
    </head>
    <body>
        <?php

        use modele\metier\Groupe;
        require_once __DIR__ . '/../includes/autoload.php';

        echo "<h2>Test unitaire de la classe métier Groupe</h2>";
        $objet = new Groupe("5455","Airsoft44","ASF44","ASF44" ,44,"VJF","A");
        var_dump($objet);
        ?>
    </body>
</html>