<?php
if (!isset($_SESSION["popup"])) {
    $_SESSION["popup"] = "none";
}
if (!isset($_SESSION["erro"])) {
    $_SESSION["erro"] = "none";
}
if (!isset($_SESSION["alerta"])) {
    $_SESSION["alerta"] = "none";
}
?>
<header>
    <div class="header-content">
        <div class="header-content-inner">
            <img class="img-responsive" src="view/assets/img/logo1.png" width="150px" style="margin: 0 auto 20px;"alt="">
            <h1 id="homeHeading">Bem vindo ao Carbônus!</h1>
            <hr class="hr-inicio">
            <p>Plataforma virtual, utilizada como intermédio entre professores e alunos, para auxiliar no ensino-aprendizagem da Química Orgânica. A plataforma utiliza uma metodologia em forma de tarefas, com perguntas sobre os compostos orgânicos, definidas pelos  professores e que devem ser resolvidas pelos alunos.</p>
            <div id="top">
                <a href="#acessar" class="btn btn-primary btn-inicio btn-lg page-scroll">Acessar</a>
            </div>
        </div>
    </div>
</header>
<section id="acessar">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <img src="view/assets/img/logo2.png" class="img-responsive" width="60px" style="margin: 0 auto 0px;">
                <div class="text-center">
                    <h5 class="h5-inicio">Carbônus</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Acesse agora!
                        </div>
                        <div class="panel-body">
                            <form action="index.php?classe=Usuario&acao=acessarsistema" method="post">
                                <div class="alert alert-danger alert-dismissable fade in" style="display: <?= $_SESSION["erro"] ?>">
                                    <a href="#" onclick="fecharErro()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Email ou senha inconrretos!</strong>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email: </label>
                                    <input id="email" type="text" name="email" class="form-control" value="<?= (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" placeholder="Digite seu email" required>
                                </div>
								<?php if(isset($_SESSION["email"])){ unset($_SESSION["email"]);} ?>
                                <div class="form-group">
                                    <label for="senha-login" >Senha:  </label>
                                    <input id="senha-login" type="password" name="senha-login" class="form-control" placeholder="Digite sua senha" required>
                                </div>
                                <button type="submit" class="btn btn-default">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cadastre-se!
                        </div>
                        <div class="panel-body">
                            <form action="index.php?classe=Usuario&acao=inserir" name="formulario" method="post">
                                <div class="alert alert-info alert-dismissable fade in" id="alerta" style="display: <?= $_SESSION["popup"] ?>">
                                    <a href="#" onclick="fecharPop()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Cadastro realizado!</strong>
                                </div>
                                <div class="alert alert-warning alert-dismissable fade in" id="alerta" style="display: <?= $_SESSION["alerta"] ?>">
                                    <a href="#" onclick="fecharAlerta()" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Já existe um cadastro no sistema com esse email!</strong>
                                </div>
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input id="nome" type="text" class="form-control" name="nome" value="<?= (isset($_SESSION['nome'])) ? $_SESSION['nome'] : '' ?>" placeholder="Digite seu nome" required>
                                </div>
                                <div class="form-group">
                                    <label for="sobrenome">Sobrenome</label>
                                    <input id="sobrenome"type="text" class="form-control" name="sobrenome" value="<?= (isset($_SESSION['sobrenome'])) ? $_SESSION['sobrenome'] : '' ?>" placeholder="Digite seu sobrenome" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="<?= (isset($_SESSION['email1'])) ? $_SESSION['email1'] : '' ?>" placeholder="Digite seu email" required>
                                </div>
								<?php if(isset($_SESSION["nome"]) && isset($_SESSION["sobrenome"]) && isset($_SESSION["email1"])){ unset($_SESSION["nome"]); unset($_SESSION["sobrenome"]); unset($_SESSION["email1"]);} ?>
                                <div class="form-group">
                                    <label for="senha1">Senha</label>
                                    <input id="senha1" type="password" class="form-control" name="senha" onkeyup = "ChecarSenha()" placeholder="Digite uma senha" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirmarsenha">Confirmar Senha</label>
                                    <input id="confirmarsenha" type="password" class="form-control" onkeyup = "ChecarSenha()" name="confirmarsenha" placeholder="Confirme sua senha" required>
                                    <div id="divcheck"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label>
                                            <input type="radio" name="opcao" value="aluno" required> Aluno
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>
                                            <input type="radio" name="opcao" value="professor" required> Professor
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" id="enviar" class="btn btn-default" disabled>Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function fecharPop() {
<?php $_SESSION["popup"] = "none" ?>;
    }
    function fecharErro() {
<?php $_SESSION["erro"] = "none" ?>;
    }
    function fecharAlerta() {
<?php $_SESSION["alerta"] = "none" ?>;
    }
</script>
