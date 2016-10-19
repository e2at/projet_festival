<?php
namespace modele\metier;

/**
 * Description of Attribution
 * attribution des chambres aux établissements
 * @author btssio
 */
class Attribution {
    private $idEtab; // ID de l'établissement
    private $typeChambre; // Type de chambre
    private $idGroupe; // ID du groupe
    private $nbChambres; // Nombre de chambres
    
    function __construct($idEtab, $typeChambre, $idGroupe, $nbChambres) {
        $this->idEtab = $idEtab;
        $this->typeChambre = $typeChambre;
        $this->idGroupe = $idGroupe;
        $this->nbChambres = $nbChambres;
    }
    
    function getIdEtab() {
        return $this->idEtab;
    }

    function getTypeChambre() {
        return $this->typeChambre;
    }

    function getIdGroupe() {
        return $this->idGroupe;
    }

    function getNbChambres() {
        return $this->nbChambres;
    }
    
    function setIdEtab($idEtab) {
        $this->idEtab = $idEtab;
    }

    function setTypeChambre($typeChambre) {
        $this->typeChambre = $typeChambre;
    }

    function setIdGroupe($idGroupe) {
        $this->idGroupe = $idGroupe;
    }

    function setNbChambres($nbChambres) {
        $this->nbChambres = $nbChambres;
    }




}