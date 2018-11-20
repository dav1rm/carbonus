<?php
$usuario = $_SESSION["usuario"];
?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Cadastro de Tarefas </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        NOVA TAREFA
                    </div>
                    <div class="panel-body">
                        <form action="index.php?classe=Tarefa&acao=inserirTarefa&idprofessor=<?= $usuario->getId(); ?>" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome" placeholder="Escreva o nome da tarefa..." required/>
                            </div>

                            <div class="form-group">
                                <label for="compostoorganico">Composto Orgânico</label>
                                <select id="compostoorganico" name="composto" class="form-control" required>
                                    <option value="">Selecione uma opção...</option>
                                    <?php
                                    $id = 0;
                                    foreach ($compostos as $c) {
                                        ?>
                                        <option value="<?= $c->getId(); ?>"><?= $c->getNomenclatura(); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nivel">Nível</label>
                                <select id="nivel" name="nivel" class="form-control" required>
                                    <option value="">Selecione uma opção...</option>
                                    <option value="Facil">Fácil</option>
                                    <option value="Medio">Médio</option>
                                    <option value="Dificil">Difícil</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alunos">Alunos:</label>
                                <a class="btn btn-default btn-block text-info" onclick="check()">
                                    <span class="glyphicon glyphicon-check"></span> Marcar todos
                                </a>
                            </div>
                            <div class="metro">
                                <div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                    <?php
                                    if (isset($alunos)) {
                                        foreach ($alunos as $a) {
                                            ?><div class="col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-12">
                                                <input type='checkbox' id="<?= $a->getId(); ?>" class='marcar' name='check[]' value="<?= $a->getId(); ?>"/>
                                                <label for="<?= $a->getId(); ?>"><?= $a->getNome() . " " . $a->getSobrenome(); ?></label>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <hr>
                                <input type="submit" class="btn btn-primary" value="Cadastrar">
                            </div>
                        </form>   
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        TAREFAS CADASTRADOS
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Nível</th>
                                        <th>Composto</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tarefas = TarefaDAO::getAll();
                                    $id = 0;
                                    foreach ($tarefas as $t) {
                                        $compostoTarefa = CompostoTarefaDAO::getById($t->getId());
                                        $id1 = $compostoTarefa->getIdComposto();
                                        ?>
                                        <tr>
                                            <td><?= $id = $id + 1; ?></td>
                                            <td><?= $t->getNome() ?></td>
                                            <td><?= $t->getNivel(); ?></td>
                                            <td><?php
                                                $com = CompostoDAO::getById($id1);
                                                if (isset($com)) {
                                                    echo $com->getNomenclatura();
                                                }
                                                ?></td>
                                            <td><a href="index.php?classe=Tarefa&acao=recuperar&id=<?= $t->getId() ?>"/>
                                                <span class="glyphicon glyphicon-edit" title="Editar"></span></a></td>
                                            <td><a href="index.php?classe=Tarefa&acao=excluir&id=<?= $t->getId() ?>" onclick="return confirm('Tem certeza que deseja excluir?');"/>
                                                <span class="glyphicon glyphicon-trash" title="Excluir"></span></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>