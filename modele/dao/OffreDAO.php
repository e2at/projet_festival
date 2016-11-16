<?php

    namespace modele\dao;

    use modele\metier\Offre;
    use PDO;
    

    class OffreDAO implements IDAO {
    
        public static function enregistrementVersObjet($unEnregistrement) {

     // A revoir        $retour = new Offre($unEnregistrement['idEtab'], $unEnregistrement['idTypeChambre'], $unEnregistrement['nombreChambres']);
            return $retour;  

        }

        public static function objetVersEnregistrement($objetMetier) {

            $retour = array(

                ':idEtab' => $objetMetier->getIdEtab(),
                ':idTypeChambre' => $objetMetier->getIdTypeChambre(),
                ':nombreChambres' => $objetMetier->getNombreChambres()

            );

            return $retour;

        }
        
        public static function getAll() {

            $retour = null;
            $sql = "SELECT * FROM Offre";

            try {
                
                $queryPrepare = Connexion::getPdo()->prepare($sql);
                
                if ($queryPrepare->execute()) {
                    
                    $retour = array();
                    
                    while ($enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC)) {
                        
                        $unObjetMetier = self::enregistrementVersObjet($enregistrement);
                        $retour[] = $unObjetMetier;

                    }

                }

            } catch (PDOException $e) {
                echo get_class() . ' - ' . __METHOD__ . ' : ' . $e->getMessage();
            }

            return $retour;

        }

        public static function getOneById($valeurClePrimaire) {
            
        }
        
        public static function getOneByIdCompo($idEtablissement, $idTypeChambre){

            $retour = null;
            $valeursClePrimaire = array($idEtablissement, $idTypeChambre);

            try {
                
                $sql = "SELECT * FROM offre WHERE idEtab = ? AND idTypeChambre = ?";
                $queryPrepare = Connexion::getPdo()->prepare($sql);
                
                if ($queryPrepare->execute($valeursClePrimaire)) {
                    
                    $enregistrement = $queryPrepare->fetch(PDO::FETCH_ASSOC);
                    $retour = self::enregistrementVersObjet($enregistrement);

                }

            } catch (PDOException $e) {
                echo get_class() . ' - '.__METHOD__ . ' : '. $e->getMessage();
            }

            return $retour;
            
        }


        public static function insert($objetMetier) {
            return FALSE;
        }
        
        public static function update($idMetier, $objetMetier) {
            return FALSE;
        }

        public static function delete($idMetier) {
            
        }

        /*
         * Obtenir le Nom et l'Identifiant d'un Etablissement
         * @Prends : (PDO)
         * @Retourne : (ID, Nom)
         */

        function modifierOffreHebergement ($connexion, $idEtab, $idTypeChambre, $nbChambresDemandees) {

            if ($nbChambresDemandees == 0) {

                $req = "DELETE FROM Offre WHERE idEtab=:idEtab and idTypeChambre=
                   :idTypeCh";
                $stmt = $connexion -> prepare ($req);
                $stmt -> bindParam (':idEtab', $idEtab);
                $stmt -> bindParam (':idTypeCh', $idTypeChambre);

            } else {

                $req2 = "SELECT NombreChambres FROM Offre WHERE idEtab=:idEtab AND 
                idTypeChambre=:idTypeCh";
                $stmt2 = $connexion -> prepare ($req2);
                $stmt2 -> bindParam (':idEtab', $idEtab);
                $stmt2 -> bindParam (':idTypeCh', $idTypeChambre);
                $stmt2 -> execute ();
                $lgOffre = $stmt2 -> fetchColumn ();

                if ($lgOffre != 0) {
                    $req = "UPDATE Offre SET NombreChambres=:nb WHERE idEtab=:idEtab AND idTypeChambre=:idTypeCh";
                } else {
                    $req = "INSERT INTO Offre VALUES (:idEtab, :idTypeCh, :nb)";
                }

                $stmt = $connexion -> prepare ($req);
                $stmt -> bindParam (':idEtab', $idEtab);
                $stmt -> bindParam (':idTypeCh', $idTypeChambre);
                $stmt -> bindParam (':nb', $nbChambresDemandees);

            }

            $ok = $stmt -> execute ();
            return $ok;

        }

        /*
         * Obtenir le Nom et l'Identifiant d'un Etablissement
         * @Prends : (PDO)
         * @Retourne : (ID, Nom)
         */

        static function obtenirNbOffre ($connexion, $idEtab, $idTypeChambre) {

            $req = "SELECT NombreChambres FROM Offre WHERE idEtab=:idEtab AND idTypeChambre=:idTypeCh";

            $stmt = $connexion -> prepare ($req);
            $stmt -> bindParam (':idEtab', $idEtab);
            $stmt -> bindParam (':idTypeCh', $idTypeChambre);
            $stmt -> execute ();

            $ok = $stmt -> fetchColumn ();

            if ($ok) {
                return $ok;
            } else {
                return 0;
            }

        }

        /*
         * Obtenir le Nom et l'Identifiant d'un Etablissement
         * @Prends : (PDO)
         * @Retourne : (ID, Nom)
         */

        function estModifOffreCorrecte ($connexion, $idEtab, $idTypeChambre, $NombreChambres) {

            $nbOccup = obtenirNbOccup ($connexion, $idEtab, $idTypeChambre);
            return  ($NombreChambres >= $nbOccup);

        }

    }

?>