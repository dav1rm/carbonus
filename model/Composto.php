<?php

class Composto {

    private $id;
    private $nomenclatura;
    private $funcaoOrganica;
    private $formulaMolecular;
    private $formulaEstrutural;
    private $Subgrupo;

    function __construct($nomenclatura, $funcaoOrganica, $formulaMolecular, $formulaEstrutural, $Subgrupo, $id = 0) {
        $this->id = $id;
        $this->nomenclatura = $nomenclatura;
        $this->funcaoOrganica = $funcaoOrganica;
        $this->formulaMolecular = $formulaMolecular;
        $this->formulaEstrutural = $formulaEstrutural;
        $this->Subgrupo = $Subgrupo;
    }

    function getId() {
        return $this->id;
    }

    function getNomenclatura() {
        return $this->nomenclatura;
    }

    function getFuncaoOrganica() {
        return $this->funcaoOrganica;
    }

    function getFormulaMolecular() {
        return $this->formulaMolecular;
    }

    function getFormulaEstrutural() {
        return $this->formulaEstrutural;
    }

    function getSubgrupo() {
        return $this->Subgrupo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNomenclatura($nomenclatura) {
        $this->nomenclatura = $nomenclatura;
    }

    function setFuncaoOrganica($funcaoOrganica) {
        $this->funcaoOrganica = $funcaoOrganica;
    }

    function setFormulaMolecular($formulaMolecular) {
        $this->formulaMolecular = $formulaMolecular;
    }

    function setFormulaEstrutural($formulaEstrutural) {
        $this->formulaEstrutural = $formulaEstrutural;
    }

    function setSubgrupo($Subgrupo) {
        $this->Subgrupo = $Subgrupo;
    }

}
