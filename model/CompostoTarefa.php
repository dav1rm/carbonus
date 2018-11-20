<?php

class CompostoTarefa {

    private $idComposto;
    private $idTarefa;

    function __construct($idComposto, $idTarefa) {

        $this->idComposto = $idComposto;
        $this->idTarefa = $idTarefa;
    }

    function getIdComposto() {
        return $this->idComposto;
    }

    function getIdTarefa() {
        return $this->idTarefa;
    }

    function setIdComposto($idComposto) {
        $this->idComposto = $idComposto;
    }

    function setIdTarefa($idTarefa) {
        $this->idTarefa = $idTarefa;
    }

}
