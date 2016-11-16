<?php
namespace modele\dao;

use modele\metier\Attribution;
use PDO;

class AttributionDAO implements IDAO {


    protected static function enregVersMetier($enreg) {
        $idEtab = $enreg['IDETAB'];
        $typeChambre = $enreg['IDTYPECHAMBRE'];
        $idGroupe = $enreg['IDGROUPE'];
        $nbChambres = $enreg['NOMBRECHAMBRES'];
        $uneAttribution = new Attribution($idEtab, $typeChambre, $idGroupe, $nbChambres);

        return $uneAttribution;
    }
    
    /**
     * Valorise les paramètre d'une requête préparée avec l'état d'un objet Attribution
     * @param type $objetMetier une Attribution
     * @param type $stmt requête préparée
     */
    
    protected static function metierVersEnreg($objetMetier, $stmt) {
        // On utilise bindValue plutôt que bindParam pour éviter des variables intermédiaires
        $stmt->bindValue(':idEtab', $objetMetier->getIdEtab());
        $stmt->bindValue(':idTypeChambre', $objetMetier->getTypeChambre());
        $stmt->bindValue(':idGroupe', $objetMetier->getIdGroupe());
        $stmt->bindValue(':nombreChambres', $objetMetier->getNbChambres());
    }
    
    public static function getAll() {
        $lesObjets = array();
        $requete = "SELECT * FROM Attribution";
        $stmt = Bdd::getPdo()->prepare($requete);
        $ok = $stmt->execute();
        if ($ok) {
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lesObjets[] = self::enregVersMetier($enreg);
            }
        }
        return $lesObjets;
    }
    
    public static function getOneById($id) {
        $objetConstruit = null;
        $requete = "SELECT * FROM Attribution WHERE idEtab = :id";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':id', $id);
        $ok = $stmt->execute();
        // attention, $ok = true pour un select ne retournant aucune ligne
        if ($ok && $stmt->rowCount() > 0) {
            $objetConstruit = self::enregVersMetier($stmt->fetch(PDO::FETCH_ASSOC));
        }
        return $objetConstruit;
    }
    
    /**
     * Insérer un nouvel enregistrement dans la table à partir de l'état d'un objet métier
     * @param Atribution $objet objet métier à insérer
     * @return boolean =FALSE si l'opérationn échoue
     */
    public static function insert($objet) {
        $requete = "INSERT INTO Attribution VALUES (:idEtab, :idTypeChambre, :idGroupe, :nombreChambres)";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $ok = $stmt->execute();
        return ($ok && $stmt->rowCount() > 0);
    }

    /**
     * Mettre à jour enregistrement dans la table à partir de l'état d'un objet métier
     * @param string identifiant de l'enregistrement à mettre à jour
     * @param Etablissement $objet objet métier à mettre à jour
     * @return boolean =FALSE si l'opérationn échoue
     */
    public static function update($id, $objet) {
        $ok = false;
        $requete = "UPDATE Attribution SET idEtab=:idEtablissement, idTypeChambre=:idTypeChambre,
           idGroupe=:idGroupe, nombreChambres=:nombreChambres
           WHERE idEtab=:id";
        $stmt = Bdd::getPdo()->prepare($requete);
        self::metierVersEnreg($objet, $stmt);
        $stmt->bindParam(':id', $id);
        $ok = $stmt->execute();
        return ($ok && $stmt->rowCount() > 0);
    }
    
    public static function delete($id) {
        $ok = false;
        $requete = "DELETE FROM Attribution WHERE idEtab = :id";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':id', $id);
        $ok = $stmt->execute();
        $ok = $ok && ($stmt->rowCount() > 0);
        return $ok;
    }
    
    public static function getAllByEtablissement($idEtab) {
        $lesGroupes = array();
        $requete = "SELECT * FROM Groupe
                    WHERE ID IN (
                    SELECT DISTINCT ID FROM Groupe g
                            INNER JOIN Attribution a ON a.IDGROUPE = g.ID 
                            WHERE IDETAB=:id
                    )";
        $stmt = Bdd::getPdo()->prepare($requete);
        $stmt->bindParam(':id', $idEtab);
        $ok = $stmt->execute();
        if ($ok) {
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lesGroupes[] = self::enregVersMetier($enreg);
            }
        } 
        return $lesGroupes;
    }
    
    public static function getAllToHost() {
        $lesGroupes = array();
        $requete = "SELECT * FROM Groupe WHERE HEBERGEMENT='O' ORDER BY ID";
        $stmt = Bdd::getPdo()->prepare($requete);
        $ok = $stmt->execute();
        if ($ok) {
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $lesGroupes[] = self::enregVersMetier($enreg);
            }
        }
        return $lesGroupes;
    }
    
}


