<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Editar Composto Orgânico </h4>
            </div>
        </div>
        <?php if (isset($composto)) { ?>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            COMPOSTO
                        </div>
                        <div class="panel-body">
                            <form action="index.php?classe=Composto&acao=editar&id=<?= $_GET["id"] ?>" name="formulario"  enctype="multipart/form-data" onsubmit="return verificarFormatoImagem(this)" method="post">
                                <div class="form-group">
                                    <label>Função Orgânica</label>
                                    <select id="funcaoorganica" onclick="DesabilitarSubgrupos(this)"name="funcaoorganica" class="form-control" required>
                                        <option value="">Selecione uma opção...</option>
                                        <option value="Hidrocarbonetos" <?= $composto->getFuncaoOrganica() == 'Hidrocarbonetos' ? 'selected' : ''; ?>>Hidrocarbonetos</option>
                                        <option value="Alcoois" <?= $composto->getFuncaoOrganica() == 'Alcoois' ? 'selected' : ''; ?>>Álcoois</option>
                                        <option value="Eteres" <?= $composto->getFuncaoOrganica() == 'Eteres' ? 'selected' : ''; ?>>Éteres</option>
                                        <option value="Esteres" <?= $composto->getFuncaoOrganica() == 'Esteres' ? 'selected' : ''; ?>>Ésteres</option>
                                        <option value="Cetonas" <?= $composto->getFuncaoOrganica() == 'Cetonas' ? 'selected' : ''; ?>>Cetonas</option>
                                        <option value="Aldeidos" <?= $composto->getFuncaoOrganica() == 'Aldeidos' ? 'selected' : ''; ?>>Aldeidos</option>
                                        <option value="Fenois" <?= $composto->getFuncaoOrganica() == 'Fenois' ? 'selected' : ''; ?>>Fenóis</option>
                                    </select>
                                </div>
                                <div class="form-group" >
                                    <?php if ($composto->getSubgrupo() != null) { ?>
                                        <label for="subgrupo">Subgrupo dos Hidrocarbonetos</label>
                                        <select class="form-control" id="subgrupo" name="subgrupo" required>
                                            <option value="">Selecione uma opção...</option>
                                            <option value="Alcanos" <?= $composto->getSubgrupo() == 'Alcanos' ? 'selected' : ''; ?>>Alcanos</option>
                                            <option value="Alcenos" <?= $composto->getSubgrupo() == 'Alcenos' ? 'selected' : ''; ?>>Alcenos</option>
                                            <option value="Alcinos" <?= $composto->getSubgrupo() == 'Alcinos' ? 'selected' : ''; ?>>Alcinos</option>
                                            <option value="Alcadienos" <?= $composto->getSubgrupo() == 'Alcadienos' ? 'selected' : ''; ?>>Alcadienos</option>
                                            <option value="Alcadiinos" <?= $composto->getSubgrupo() == 'Alcadiinos' ? 'selected' : ''; ?>>Alcadiinos</option>
                                            <option value="Cicloalcanos" <?= $composto->getSubgrupo() == 'Cicloalcanos' ? 'selected' : ''; ?>>Cicloalcanos</option>
                                            <option value="Cicloalcenos" <?= $composto->getSubgrupo() == 'Cicloalcenos' ? 'selected' : ''; ?>>Cicloalcenos</option>
                                        </select>
                                    <?php } else { ?>
                                        <label for="subgrupo">Subgrupo dos Hidrocarbonetos</label>
                                        <select class="form-control" id="subgrupo" name="subgrupo" required disabled>
                                            <option value="">Selecione uma opção...</option>
                                            <option value="Alcanos" <?= $composto->getSubgrupo() == 'Alcanos' ? 'selected' : ''; ?>>Alcanos</option>
                                            <option value="Alcenos" <?= $composto->getSubgrupo() == 'Alcenos' ? 'selected' : ''; ?>>Alcenos</option>
                                            <option value="Alcinos" <?= $composto->getSubgrupo() == 'Alcinos' ? 'selected' : ''; ?>>Alcinos</option>
                                            <option value="Alcadienos" <?= $composto->getSubgrupo() == 'Alcadienos' ? 'selected' : ''; ?>>Alcadienos</option>
                                            <option value="Alcadiinos" <?= $composto->getSubgrupo() == 'Alcadiinos' ? 'selected' : ''; ?>>Alcadiinos</option>
                                            <option value="Cicloalcanos" <?= $composto->getSubgrupo() == 'Cicloalcanos' ? 'selected' : ''; ?>>Cicloalcanos</option>
                                            <option value="Cicloalcenos" <?= $composto->getSubgrupo() == 'Cicloalcenos' ? 'selected' : ''; ?>>Cicloalcenos</option>
                                        </select>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="nomenclatura">Nomenclatura IUPAC</label>
                                    <input id="nomenclatura" type="text" class="form-control" name="nomenclatura" value="<?= $composto->getNomenclatura() ?>" placeholder="Escreva a nomenclatura" required/>
                                </div>
                                <div class="form-group">
                                    <label for="formulamolecular">Fórmula molecular</label>
                                    <input id="formulamolecular" type="text" name="formulamolecular" value="<?= $composto->getFormulaMolecular() ?>" class="form-control" placeholder="Escreva a fórmula molecular" required/>
                                </div>
                                <div class="form-group">
                                    <label for="formulaestrutural">Fórmula estrutural</label>
                                    <div class="form-group">
                                        <img src="<?= $composto->getFormulaEstrutural() ?>" alt="..." class="img-preview">
                                        <p class="help-block">Imagem da estrutura do composto.</p>
                                    </div>

                                    <div class="input-group col-md-4 col-sm-4 col-xs-12">
                                        <input type="text"  class="form-control" readonly>
                                        <label class="input-group-btn">
                                            <span class="btn btn-default">
                                                Alterar<input type="file" id="formulaestrutural" name="formulaestrutural" style="display: none;" multiple>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tipos de cadeias</label>
                                </div>
                                <div class="metro">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <input id="Ramificada" onclick="DesabilitarRamificacoes();" type="checkbox" <?= in_array(1, $todascadeias) ? 'checked' : ''; ?> name="cadeia[]" value="1" >
                                            <label for="Ramificada">Ramificada</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="Linear" type="checkbox" <?= in_array(2, $todascadeias) ? 'checked' : ''; ?>  name="cadeia[]" value="2" >
                                            <label for="Linear">Linear</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="Ciclica" type="checkbox" <?= in_array(3, $todascadeias) ? 'checked' : ''; ?>  name="cadeia[]" value="3" >
                                            <label for="Ciclica">Cíclica</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="Aciclica" type="checkbox" <?= in_array(4, $todascadeias) ? 'checked' : ''; ?>  name="cadeia[]" value="4" >
                                            <label for="Aciclica">Acíclica</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="Saturada" type="checkbox" <?= in_array(5, $todascadeias) ? 'checked' : ''; ?>  name="cadeia[]" value="5" >
                                            <label for="Saturada">Saturada</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="Insaturada" type="checkbox" <?= in_array(6, $todascadeias) ? 'checked' : ''; ?>  name="cadeia[]" value="6" >
                                            <label for="Insaturada">Insaturada</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="Homogenea" type="checkbox" <?= in_array(7, $todascadeias) ? 'checked' : ''; ?>  name="cadeia[]" value="7" >
                                            <label for="Homogenea">Homogênea</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="Heterogenea" type="checkbox" <?= in_array(8, $todascadeias) ? 'checked' : ''; ?>  name="cadeia[]" value="8" >
                                            <label for="Heterogenea">Heterogênea</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="Aromatica" type="checkbox" <?= in_array(9, $todascadeias) ? 'checked' : ''; ?>  name="cadeia[]" value="9" >
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
                                            <input id="1" type="checkbox" <?= in_array(1, $todasramificacoes) ? 'checked' : ''; ?> name="ramificacao[]" value="1" <?= ($todasramificacoes == null) ? 'disabled' : ''; ?>>
                                            <label for="1">Metil(a)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="2" type="checkbox" <?= in_array(2, $todasramificacoes) ? 'checked' : ''; ?> name="ramificacao[]" value="2" <?= ($todasramificacoes == null) ? 'disabled' : ''; ?>>
                                            <label for="2">Etil(a)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="3" type="checkbox" <?= in_array(3, $todasramificacoes) ? 'checked' : ''; ?> name="ramificacao[]" value="3" <?= ($todasramificacoes == null) ? 'disabled' : ''; ?>>
                                            <label for="3">Propil(a)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="4" type="checkbox" <?= in_array(4, $todasramificacoes) ? 'checked' : ''; ?> name="ramificacao[]" value="4" <?= ($todasramificacoes == null) ? 'disabled' : ''; ?>>
                                            <label for="4">Isopropil(a)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="5" type="checkbox" <?= in_array(5, $todasramificacoes) ? 'checked' : ''; ?> name="ramificacao[]" value="5" <?= ($todasramificacoes == null) ? 'disabled' : ''; ?>>
                                            <label for="5">Butil(a)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="6" type="checkbox" <?= in_array(6, $todasramificacoes) ? 'checked' : ''; ?> name="ramificacao[]" value="6" <?= ($todasramificacoes == null) ? 'disabled' : ''; ?>>
                                            <label for="6">Secbutil(a)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="7" type="checkbox" <?= in_array(7, $todasramificacoes) ? 'checked' : ''; ?> name="ramificacao[]" value="7" <?= ($todasramificacoes == null) ? 'disabled' : ''; ?>>
                                            <label for="7">Tercbutil(a)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="8" type="checkbox" <?= in_array(8, $todasramificacoes) ? 'checked' : ''; ?> name="ramificacao[]" value="8" <?= ($todasramificacoes == null) ? 'disabled' : ''; ?>>
                                            <label for="8">Isobutil(a)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="9" type="checkbox" <?= in_array(9, $todasramificacoes) ? 'checked' : ''; ?> name="ramificacao[]" value="9" <?= ($todasramificacoes == null) ? 'disabled' : ''; ?>>
                                            <label for="9">Fenil(a)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input id="10" type="checkbox" <?= in_array(10, $todasramificacoes) ? 'checked' : ''; ?> name="ramificacao[]" value="10" <?= ($todasramificacoes == null) ? 'disabled' : ''; ?>>
                                            <label for="10">Benzil(a)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr/>
                                    <input type="submit" class="btn btn-primary" value="Salvar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>