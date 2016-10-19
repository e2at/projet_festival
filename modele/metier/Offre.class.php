<?php



/**
 * Description of Offre
 *
 * @author Groupe 3
 */
class Offre {
    private $unEtablissement;
    private $unTypeChambre;
    private $nbreCambre;
    
    public function __construct($unEtablissement, $unTypeChambre, $nbreChambre) {
        $this->unEtablissement = $unEtablissement;
        $this->unTypeChambre = $unTypeChambre;
        $this->nbreCambre = $nbreChambre;
        
    }
    function getUnEtablissement() {
        return $this->unEtablissement;
    }

    function getUnTypeChambre() {
        return $this->unTypeChambre;
    }

    function getNbreCambre() {
        return $this->nbreCambre;
    }

    function setUnEtablissement($unEtablissement) {
        $this->unEtablissement = $unEtablissement;
    }

    function setUnTypeChambre($unTypeChambre) {
        $this->unTypeChambre = $unTypeChambre;
    }

    function setNbreCambre($nbreCambre) {
        $this->nbreCambre = $nbreCambre;
    }

}
