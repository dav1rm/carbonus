<?php
require_once('control/CompostoController.php');
require_once('control/TarefaController.php');
require_once('control/UsuarioController.php');

if (isset($_GET["classe"]) && isset($_GET["acao"])) {
    $classe = $_GET["classe"] . 'Controller';
    $classe::$_GET["acao"]();
} else {
    if ($_SESSION["usuario"]->getDesempenho() != null) {
        TarefaController::listarTarefas();
    } else {
        TarefaController::cadastrarTarefa();
    }
}
?>
<?php

/*
  if (!isset($_GET["acao"]) && !isset($_GET["classe"])) {
  require_once 'view/principal.php';
  } else {

  $caminho = 'control/' . $_GET["classe"] . "Controller.php";
  require_once $caminho;
  $caminhocontroller = $_GET["classe"] . "Controller";
  $acao = $_GET["acao"];
  $controller = new $caminhocontroller();
  $controller->$acao();
  //$name = $_GET["classe"]."Control()";
  //$controller = new $name;/*
  // $controller->$_GET["acao"]."()";
  } */
?>