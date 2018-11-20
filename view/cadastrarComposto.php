<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Cadastro de Compostos Orgânicos </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        NOVO COMPOSTO
                    </div>
                    <div class="panel-body">
                        <form action="index.php?classe=Composto&acao=inserirComposto" name="formulario" enctype="multipart/form-data" onsubmit="return VerificarCampoImagem()" method="post">
                            <div class="form-group">
                                <label>Função Orgânica</label>
                                <select id="funcaoorganica" onclick="DesabilitarSubgrupos(this)" name="funcaoorganica" class="form-control" required>
                                    <option value="">Selecione uma opção...</option>
                                    <option value="Hidrocarbonetos">Hidrocarbonetos</option>
                                    <option value="Alcoois">Álcoois</option>
                                    <option value="Eteres">Éteres</option>
                                    <option value="Esteres">Ésteres</option>
                                    <option value="Cetonas">Cetonas</option>
                                    <option value="Aldeidos">Aldeidos</option>
                                    <option value="Fenois">Fenóis</option>
                                </select>
                            </div>
                            <div class="form-group" >
                                <label>Subgrupo dos Hidrocarbonetos</label>
                                <select class="form-control" id="subgrupo" name="subgrupo" required disabled>
                                    <option value="">Selecione uma opção...</option>
                                    <option value="Alcanos">Alcanos</option>
                                    <option value="Alcenos">Alcenos</option>
                                    <option value="Alcinos">Alcinos</option>
                                    <option value="Alcadienos">Alcadienos</option>
                                    <option value="Alcadiinos">Alcadiinos</option>
                                    <option value="Cicloalcanos">Cicloalcanos</option>
                                    <option value="Cicloalcenos">Cicloalcenos</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nomenclatura">Nomenclatura IUPAC</label>
                                <input id="msg" type="text" class="form-control" name="nomenclatura" id="nomenclatura" placeholder="Escreva a nomenclatura" required/>
                            </div>
                            <div class="form-group">
                                <label for="formulamolecular">Fórmula molecular</label>
                                <input type="text" name="formulamolecular" class="form-control" id="formulamolecular" placeholder="Escreva a fórmula molecular" required/>
                            </div>
                            <div class="form-group">
                                <label for="formulaestrutural">Fórmula estrutural</label>
                                <div class="input-group col-md-12">
                                    <input type="text" class="form-control" readonly>
                                    <label class="input-group-btn">
                                        <span class="btn btn-default">
                                            Selecionar foto<input type="file" id="formulaestrutural" name="formulaestrutural" style="display: none;" multiple>
                                        </span>
                                    </label>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div id="msg"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tipos de cadeias</label>
                            </div>
                            <div class="metro">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <input id="Ramificada" onclick="DesabilitarRamificacoes()"type="checkbox" name="cadeia[]" value="1" >
                                        <label for="Ramificada">Ramificada</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="Linear" type="checkbox" name="cadeia[]" value="2" >
                                        <label for="Linear">Linear</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="Ciclica" type="checkbox" name="cadeia[]" value="3" >
                                        <label for="Ciclica">Cíclica</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="Aciclica" type="checkbox" name="cadeia[]" value="4" >
                                        <label for="Aciclica">Acíclica</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="Saturada" type="checkbox" name="cadeia[]" value="5" >
                                        <label for="Saturada">Saturada</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="Insaturada" type="checkbox" name="cadeia[]" value="6" >
                                        <label for="Insaturada">Insaturada</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="Homogenea"type="checkbox" name="cadeia[]" value="7" >
                                        <label for="Homogenea">Homogênea</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="Heterogenea" type="checkbox" name="cadeia[]" value="8" >
                                        <label for="Heterogenea">Heterogênea</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="Aromatica" type="checkbox" name="cadeia[]" value="9" >
                                        <label for="Aromatica">Aromática</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12"><hr/></div>
                            <div class="form-group">
                                <label>Tipos de Ramificações</label>
                            </div>
                            <div class="metro">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <input id="1" type="checkbox" name="ramificacao[]" value="1" disabled>
                                        <label for="1">Metil(a)</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="2" type="checkbox" name="ramificacao[]" value="2" disabled>
                                        <label for="2">Etil(a)</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="3" type="checkbox" name="ramificacao[]" value="3" disabled>
                                        <label for="3">Propil(a)</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="4" type="checkbox" name="ramificacao[]" value="4" disabled>
                                        <label for="4">Isopropil(a)</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="5" type="checkbox" name="ramificacao[]" value="5" disabled>
                                        <label for="5">Butil(a)</label>
                                    </div>

                                    <div class="col-md-6">
                                        <input id="6" type="checkbox" name="ramificacao[]" value="6" disabled>
                                        <label for="6">Secbutil(a)</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="7" type="checkbox" name="ramificacao[]" value="7" disabled>
                                        <label for="7">Tercbutil(a)</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="8" type="checkbox" name="ramificacao[]" value="8" disabled>
                                        <label for="8">Isobutil(a)</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="9" type="checkbox" name="ramificacao[]" value="9" disabled>
                                        <label for="9">Fenil(a)</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="10" type="checkbox" name="ramificacao[]" value="10" disabled>
                                        <label for="10">Benzil(a)</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr/>
                                <input type="submit" id="enviar" class="btn btn-primary" value="Cadastrar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        COMPOSTOS CADASTRADOS
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nomenclatura</th>
                                        <th>Função Orgânica</th>
                                        <th>Fórmula Molecular</th>
                                        <th>Detalhes</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 0;
                                    if (isset($compostos)) {
                                        foreach ($compostos as $c) {
                                            ?>
                                            <tr>
                                                <td><?= $id = $id + 1; ?></td>
                                                <td><?= $c->getNomenclatura(); ?></td>
                                                <td><?= $c->getFuncaoOrganica(); ?></td>
                                                <td><?= $c->getFormulaMolecular(); ?></td>
                                                <td><a href="index.php?classe=Composto&acao=detalhesComposto&id=<?= $c->getId(); ?>"/>
                                                    <span class='glyphicon glyphicon-search' title="Ver detalhes"></span></a></td>
                                                <td><a href="index.php?classe=Composto&acao=recuperar&id=<?= $c->getId() ?>"/>
                                                    <span class="glyphicon glyphicon-edit" title="Editar"></span></a></td>
                                                <td><a href="index.php?classe=Composto&acao=excluir&id=<?= $c->getId() ?>" onclick="return confirm('Tem certeza que deseja excluir?');"/>
                                                    <span class="glyphicon glyphicon-trash" title="Excluir"></span></a></td>
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