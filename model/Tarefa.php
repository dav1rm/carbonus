<?php

class Tarefa {

    private $id;
    private $idprofessor;
    private $nome;
    //private $pontuacao;
    private $nivel;

    function __construct($idprofessor, $nome,/* $pontuacao,*/ $nivel, $id = 0) {
        $this->id = $id;
        $this->idprofessor = $idprofessor;
        $this->nome = $nome;
        //$this->pontuacao = $pontuacao;
        $this->nivel = $nivel;
    }

    function getId() {
        return $this->id;
    }

    function getIdprofessor() {
        return $this->idprofessor;
    }

    function getNome() {
        return $this->nome;
    }

//    function getPontuacao() {
//        return $this->pontuacao;
//    }

    function getNivel() {
        return $this->nivel;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdprofessor($idprofessor) {
        $this->idprofessor = $idprofessor;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

//    function setPontuacao($pontuacao) {
//        $this->pontuacao = $pontuacao;
//    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

}
