<?php
require_once 'control/UsuarioController.php';
require_once 'model/UsuarioDAO.php';
session_start();
?>﻿
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" type="image/png" href="view/assets/img/icon.png" />
        <title>Carbônus</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="view/assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONT AWESOME ICONS  -->
        <link href="view/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="view/assets/css/style.css" rel="stylesheet" />
        <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php
        if (isset($_SESSION["usuario"])) {
            require_once 'view/nav.php';
            require_once 'view/content.php';
            require_once 'view/rodape.php';
        } else {
            if (isset($_GET["acao"]) && $_GET["acao"] == "inserir") {
                UsuarioController::inserir();
            } else if (isset($_GET["acao"]) && $_GET["acao"] == "acessarsistema") {
                UsuarioController::acessarsistema();
            } else {
                require_once 'view/inicio.php';
            }
        }
        ?>
        <script src="view/assets/js/jquery-1.11.1.js"></script>
        <script src="view/assets/js/bootstrap.js"></script>   
    </body>
</html>
	