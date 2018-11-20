<?php

class Ramificacao {
    private $id;
    private $nome;
    
    function __construct($nome, $id=0) {
        $this->id = $id;
        $this->nome = $nome;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
}
