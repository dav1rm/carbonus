<?php

class Usuario {

    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $imagem;
    private $desempenho;
    private $descricao;

    function __construct($nome, $sobrenome, $email, $senha, $imagem, $desempenho, $descricao, $id = 0) {
        $this->id = $id;
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->senha = $senha;
        $this->imagem = $imagem;
        $this->desempenho = $desempenho;
        $this->descricao = $descricao;
    }
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getSobrenome() {
        return $this->sobrenome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getDesempenho() {
        return $this->desempenho;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function setDesempenho($desempenho) {
        $this->desempenho = $desempenho;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
}
