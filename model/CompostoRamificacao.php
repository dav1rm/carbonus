<?php

class CompostoRamificacao {

    private $idComposto;
    private $idRamificacao;

    function __construct($idComposto, $idRamificacao) {
        $this->idComposto = $idComposto;
        $this->idRamificacao = $idRamificacao;
    }

    function getIdComposto() {
        return $this->idComposto;
    }

    function getIdRamificacao() {
        return $this->idRamificacao;
    }

    function setIdComposto($idComposto) {
        $this->idComposto = $idComposto;
    }

    function setIdRamificacao($idRamificacao) {
        $this->idRamificacao = $idRamificacao;
    }

}
