<?php

class AlunoTarefa {

    private $idtarefa;
    private $idaluno;
    private $concluida;

    function __construct($idaluno, $idtarefa, $concluida) {
        $this->idtarefa = $idtarefa;
        $this->idaluno = $idaluno;
        $this->concluida = $concluida;
    }

    function getIdtarefa() {
        return $this->idtarefa;
    }

    function getIdaluno() {
        return $this->idaluno;
    }

    function getConcluida() {
        return $this->concluida;
    }

    function setIdtarefa($idtarefa) {
        $this->idtarefa = $idtarefa;
    }

    function setIdaluno($idaluno) {
        $this->idaluno = $idaluno;
    }

    function setConcluida($concluida) {
        $this->concluida = $concluida;
    }

}
