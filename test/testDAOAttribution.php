<?php

        use modele\dao\AttributionDAO;
        use modele\dao\Bdd;
        use modele\metier\Attribution;

require_once __DIR__ . '/../includes/autoload.php';

        $id = '0350773A';
        Bdd::connecter();

        echo "<h2>1- AttributionDAO</h2>";

        // Test n°1
        echo "<h3>1- Test getOneById</h3>";
        try {
            $objet = AttributionDAO::getOneById($id);
            var_dump($objet);
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }

        // Test n°2
        echo "<h3>2- getAll</h3>";
        try {
            $lesObjets = AttributionDAO::getAll();
            var_dump($lesObjets);
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }

        // Test n°3
        echo "<h3>3- insert</h3>";
        try {
            $id = '0350773A';
            $objet = new Attribution($id, 'C2', 'g009', '4');
            $ok = AttributionDAO::insert($objet);
            if ($ok) {
                echo "<h4>ooo réussite de l'insertion ooo</h4>";
                $objetLu = AttributionDAO::getOneById($id);
                var_dump($objetLu);
            } else {
                echo "<h4>*** échec de l'insertion ***</h4>";
            }
        } catch (Exception $e) {
            echo "<h4>*** échec de la requête ***</h4>" . $e->getMessage();
        }

        // Test n°3-bis
        echo "<h3>3- insert déjà présent</h3>";
        try {
            $id = '0350773A';
            $objet = new Attribution($id, 'C2.2', 'g009.9', '4.4');
            $ok = AttributionDAO::insert($objet);
            if ($ok) {
                echo "<h4>*** échec du test : l'insertion ne devrait pas réussir  ***</h4>";
                $objetLu = Bdd::getOneById($id);
                var_dump($objetLu);
            } else {
                echo "<h4>ooo réussite du test : l'insertion a logiquement échoué ooo</h4>";
            }
        } catch (Exception $e) {
            echo "<h4>ooo réussite du test : la requête d'insertion a logiquement échoué ooo</h4>" . $e->getMessage();
        }

        // Test n°4
        echo "<h3>4- update</h3>";
        try {
            $objet->setTypeChambre('C1');
            $objet->setIdGroupe('Nantes');
            $ok = AttributionDAO::update($id, $objet);
            if ($ok) {
                echo "<h4>ooo réussite de la mise à jour ooo</h4>";
                $objetLu = AttributionDAO::getOneById($id);
                var_dump($objetLu);
            } else {
                echo "<h4>*** échec de la mise à jour ***</h4>";
            }
        } catch (Exception $e) {
            echo "<h4>*** échec de la requête ***</h4>" . $e->getMessage();
        }

        // Test n°5
        echo "<h3>5- delete</h3>";
        try {
            $ok = AttributionDAO::delete($id);
//            $ok = EtablissementDAO::delete("xxx");
            if ($ok) {
                echo "<h4>ooo réussite de la suppression ooo</h4>";
            } else {
                echo "<h4>*** échec de la suppression ***</h4>";
            }
        } catch (Exception $e) {
            echo "<h4>*** échec de la requête ***</h4>" . $e->getMessage();
        }

        // Test n°6
        echo "<h3>6- getAllByEtablissement</h3>";
        try {
            $lesObjets = AttributionDAO::getAllByEtablissement();
            var_dump($lesObjets);
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }      
        
        // Test n°7
        echo "<h3>7- getAllToHost</h3>";
        try {
            $lesObjets = AttributionDAO::getAllToHost();
            var_dump($lesObjets);
        } catch (Exception $ex) {
            echo "<h4>*** échec de la requête ***</h4>" . $ex->getMessage();
        }

        Bdd::deconnecter();
        ?>


    </body>
</html>
