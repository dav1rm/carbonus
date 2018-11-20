<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="view/assets/img/logo.png" class="logo"/>
            </a>
        </div>
        <?php $usuario = $_SESSION["usuario"]; ?>
        <div class="left-div">
            <div class="user-settings-wrapper">
                <ul class="nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php
                        if ($usuario->getDesempenho() != null) {
                            UsuarioController::verificarPontuacao($usuario);
                        }
                        ?>" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                        </a>
                        <div class="dropdown-menu dropdown-settings">
                            <div class="media">
                                <a class="media-left" href="index.php?classe=Usuario&acao=recuperar&id=<?= $usuario->getId(); ?>">
                                    <img src="<?= $usuario->getImagem(); ?>" alt="" class="img-rounded" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><?= $usuario->getNome() . " " . $usuario->getSobrenome() ?></h4>
                                    <?php if ($usuario->getDesempenho() == null) { ?>
                                        <h5>Professor</h5>
                                    <?php } else { ?>
                                        <h5>Aluno</h5>
                                    <?php } ?>
                                </div>
                            </div>
                            <hr>
                            <?php if ($usuario->getDesempenho() == null) { ?>
                                <h5><strong>Descrição:</strong></h5>
                                <p class="p-nav"><?= $usuario->getDescricao(); ?></p>
                            <?php } else { ?>
                                <h5><strong>Desempenho:</strong></h5>
                                <p><?= $usuario->getDesempenho(); ?>%</p>
                            <?php } ?>
                            <hr>
                            <div class="text-center">
                                <a href="index.php?classe=Usuario&acao=recuperar&id=<?= $usuario->getId(); ?>" class="btn btn-info btn-sm">Editar Perfil</a>&nbsp; <a href="index.php?classe=Usuario&acao=sair" class="btn btn-danger btn-sm">Sair</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- BARRA DE MENU-->
<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id = "menu-top" class = "nav navbar-nav navbar-right">
                            <?php if ($usuario->getDesempenho() != null) { ?>
                            <li><a class = "menu-top" href = "index.php?classe=Tarefa&acao=listarTarefas">Tarefas</a></li>
                            <?php } else { ?>
                            <li><a href = "index.php?classe=Composto&acao=CadastrarComposto">Cadastrar Composto</a></li>
                            <li><a href = "index.php?classe=Tarefa&acao=cadastrarTarefa">Cadastrar Tarefa</a></li>
                            <li><a href = "index.php?classe=Usuario&acao=listarAlunos">Visualizar Alunos</a></li>
                            <?php } ?>
                        <li><a href = "index.php?classe=Usuario&acao=sobre">Sobre</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>