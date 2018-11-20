<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Alunos Cadastrados</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Imagem</th>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Desempenho</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 0;
                                    if (isset($alunos)) {
                                        foreach ($alunos as $a) {
                                            ?>
                                            <tr>
                                                <td><?= $id = $id + 1; ?></td>
                                                <td><img src="<?= $a->getImagem(); ?>" class="img-perfil"></td>
                                                <td><?= $a->getNome() . " " . $a->getSobrenome(); ?></td>
                                                <td><?= $a->getEmail(); ?></td>
                                                <td><?= $a->getDesempenho(); ?>%</td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>