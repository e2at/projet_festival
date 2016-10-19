<?php



/**
 * Description of Offre
 *
 * @author Groupe 3
 */
class Offre {
    private $unEtablissement;
    private $unTypeChambre;
    private $nbreChambre;
    
    public function __construct($unEtablissement, $unTypeChambre, $nbreChambre) {
        $this->unEtablissement = $unEtablissement;
        $this->unTypeChambre = $unTypeChambre;
        $this->nbreChambre = $nbreChambre;
        
    }
    function getUnEtablissement() {
        return $this->unEtablissement;
    }

    function getUnTypeChambre() {
        return $this->unTypeChambre;
    }

    function getNbreChambre() {
        return $this->nbreChambre;
    }

    function setUnEtablissement($unEtablissement) {
        $this->unEtablissement = $unEtablissement;
    }

    function setUnTypeChambre($unTypeChambre) {
        $this->unTypeChambre = $unTypeChambre;
    }

    function setNbreChambre($nbreChambre) {
        $this->nbreChambre = $nbreChambre;
    }

}
