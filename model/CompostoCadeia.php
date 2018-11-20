<?php
class CompostoCadeia {
    private $idComposto;
    private $idCadeia;
    
    function __construct($idComposto, $idCadeia) {
        $this->idComposto = $idComposto;
        $this->idCadeia = $idCadeia;
    }
    
    function getIdComposto() {
        return $this->idComposto;
    }

    function getIdCadeia() {
        return $this->idCadeia;
    }

    function setIdComposto($idComposto) {
        $this->idComposto = $idComposto;
    }

    function setIdCadeia($idCadeia) {
        $this->idCadeia = $idCadeia;
    }
}
