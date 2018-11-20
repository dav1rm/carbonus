<?php

class Cadeia {
    private $id;
    private $tipo;
    
    function __construct($tipo, $id=0) {
        $this->id = $id;
        $this->tipo = $tipo;
    }
    
    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}
