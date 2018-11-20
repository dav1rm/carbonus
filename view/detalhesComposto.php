<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Detalhes</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <tbody>
                                <?php
                                if (isset($composto)) {
                                    ?>
                                    <tr>
                                        <th>#</th>
                                        <td><?= $composto->getId(); ?></td>

                                    </tr>
                                    <tr>
                                        <th>Nomenclatura</th>
                                        <td><?= $composto->getNomenclatura(); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Função Orgânica</th>
                                        <td><?= $composto->getFuncaoOrganica(); ?></td>
                                    </tr>
                                    <?php if ($composto->getSubgrupo() != null) { ?>
                                        <tr>
                                            <th>Subgrupo</th>
                                            <td><?= $composto->getSubgrupo(); ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>Fórmula Molecular</th>
                                        <td><?= $composto->getFormulaMolecular(); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Formula Estrutural</th>
                                        <td><img class="img-tarefa" src="<?= $composto->getFormulaEstrutural(); ?>"></td>
                                    </tr>
                                    <?php if (isset($todasramificacoes) && $todasramificacoes != null) { ?>
                                        <tr>
                                            <th>Ramificações</th>
                                            <td><?php
                                                foreach ($todasramificacoes as $r) {
                                                    echo $r . "<br/>";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } if (isset($todascadeias) && $todascadeias != null) { ?>
                                        <tr>
                                            <th>Tipos de Cadeias</th>
                                            <td><?php
                                                foreach ($todascadeias as $c) {
                                                    echo $c . "<br/>";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="btn btn-default" onclick="location.href = 'index.php?classe=Composto&acao=CadastrarComposto'">Voltar</button>
            </div>
        </div>
    </div>
</div>