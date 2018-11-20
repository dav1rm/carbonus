<?php
$usuario = $_SESSION["usuario"];
?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Editar Tarefa</h4>
            </div>
        </div>
        <?php if (isset($tarefa)) { ?>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            TAREFA
                        </div>
                        <div class="panel-body">
                            <form action="index.php?classe=Tarefa&acao=editar&id=<?= $_GET["id"] ?>"  method="post">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" name="nome" id="nome" value="<?= $tarefa->getNome() ?>" class="form-control" id="exampleInputEmail1" placeholder="Escreva o nome da tarefa..." required/>
                                </div>
                                <div class="form-group">
                                    <label for="compostoorganico">Composto Orgânico</label>
                                    <select id="compostoorganico" name="composto" class="form-control" required>
                                        <option value="">Selecione uma opção...</option>
                                        <?php
                                        if (isset($compostos)) {
                                            foreach ($compostos as $c) {
                                                ?>
                                                <option value="<?= $c->getId(); ?>" <?= $c->getId() == $compostoTarefa->getIdComposto() ? 'selected' : ''; ?>><?= $c->getNomenclatura(); ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nível</label>
                                    <select id="compostoorganico" name="nivel" class="form-control" required>
                                        <option value="">Selecione uma opção...</option>
                                        <option value="Facil" <?= $tarefa->getNivel() == 'Facil' ? 'selected' : ''; ?>>Fácil</option>
                                        <option value="Medio" <?= $tarefa->getNivel() == 'Medio' ? 'selected' : ''; ?>>Médio</option>
                                        <option value="Dificil" <?= $tarefa->getNivel() == 'Dificil' ? 'selected' : ''; ?>>Difícil</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alunos:</label>
                                    <a class="btn btn-default btn-block text-info" onclick="check()">
                                    <span class="glyphicon glyphicon-check"></span> Marcar todos
                                </a>
                                </div>
                                <div class="metro">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                        <?php
                                        if (isset($todosalunos)) {
                                            foreach ($todosalunos as $a) {
                                                ?><div class="col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-12">
                                                    <input type='checkbox' id="<?= $a->getId(); ?>" class='marcar'<?= in_array($a->getId(), $alunos) ? 'checked' : ''; ?> name='check[]' value="<?= $a->getId(); ?>"/>
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
                                    <input type="submit" class="btn btn-primary" value="Atualizar">
                                </div>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>