<?php if (isset($u)) { ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Editar Conta</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Alterar Cadastro
                        </div>
                        <div class="panel-body">
                            <div class="panel-body">
                                <form action="index.php?classe=Usuario&acao=editar&id=<?= $u->getId() ?>" enctype="multipart/form-data" onsubmit="return verificarFormatoImagem(this)" method="post">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="text-center">
                                            <img src = "<?= $u->getImagem() ?>" id="foto" class="img-thumbnail form-group img-responsive">
                                        </div>
                                        <div class="col-md-12 text-center form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" readonly>
                                                <label class="input-group-btn">
                                                    <span class="btn btn-default">
                                                        Alterar foto<input type="file" name="imagem" style="display: none;" multiple>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-default btn-block text-warning" data-toggle="modal" data-target="#myModal">
                                                <span class="glyphicon glyphicon-pencil"></span> Alterar senha </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-default btn-block text-danger" href="index.php?classe=Usuario&acao=excluir&id=<?= $u->getId() ?>" onclick="return confirm('Tem certeza que deseja excluir?');">
                                                <span class="glyphicon glyphicon-exclamation-sign"></span> Excluir conta </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" id="nome" class="form-control" name="nome" value="<?= $u->getNome() ?>" placeholder="Digite seu nome" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sobrenome">Sobrenome</label>
                                            <input type="text" id="sobrenome"class="form-control" name="sobrenome"  value="<?= $u->getSobrenome() ?>"  placeholder="Digite seu sobrenome" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" class="form-control" name="email"  value="<?= $u->getEmail() ?>"  placeholder="Digite seu email" disabled required>
                                        </div>
                                        <?php if ($u->getDesempenho() == null) { ?>
                                            <div class="form-group">
                                                <label for="descricao">Descrição</label>  <span class="glyphicon glyphicon-question-sign" title="Faça uma breve descrição sobre sua formação, quanto tempo e em qual instituição leciona a disciplina..."></span>
                                                <textarea id="descricao" onkeyup="blocTexto(this.value)" onload="verificartexto(this.value)" class="form-control" name="descricao" placeholder="Digite uma breve descrição"><?= $u->getDescricao(); ?></textarea>
                                                Caracteres restantes: <span id="cont">250</span>
                                            </div>
                                            <script>
                                                window.onload = function () {
                                                    verificartexto(document.getElementById('descricao').value);
                                                }
                                            </script>
                                        <?php } ?>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="index.php?classe=Usuario&acao=editar&id=<?= $u->getId() ?>" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Alterar Senha</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="senha_antiga">Senha antiga</label>
                                    <input type="password" id="senha_antiga" class="form-control" name="senha_antiga" placeholder="Digite sua senha" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="senha1">Nova senha</label>
                                    <input type="password" id="senha1"  onkeyup = "ChecarSenha()" class="form-control" name="senha" placeholder="Digite uma nova senha" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="confirmarsenha">Repetir senha</label>
                                    <input type="password" id="confirmarsenha"  onkeyup = "ChecarSenha()" class="form-control" name="confirmarsenha" placeholder="Digite novamente a senha" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div id="divcheck"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="enviar" class="btn btn-primary" disabled>Salvar Alterações</button>
                    </div>
                </div>
            </form>   
        </div>
    </div>
<?php } ?>