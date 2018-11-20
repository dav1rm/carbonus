<?php
if (isset($questoes) && isset($alternativas) && isset($imagens) && isset($respostas)) {
    $idPergunta = $_GET["idPergunta"];
    if ($idPergunta < $tamanho) {
        $n = 100 / $tamanho;
        shuffle($alternativas[$idPergunta]);
        ?>
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <h4 class="titulo-tarefa">Tarefa - <?= $t->getNome(); ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="progress">
                        <div id="progresso" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="<?= $idPergunta + 1 ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $n * ($idPergunta) ?>%"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group ">
                            <h3 id="pergunta" class="pergunta-tarefa" ><?= $questoes[$idPergunta] ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12" id="mensagem" role="alert"></div>
                    <?php $valor = strpos($questoes[$idPergunta], "abaixo?"); ?>
                    <?php if (isset($imagens[$idPergunta]) && substr($alternativas[$idPergunta][0], 0, 13) != "view/uploads/" && $valor != false) { ?>
                        <div class="col-md-12 col-sm-12 col-xs-12">    
                            <div class="form-group ">
                                <img src="<?= $imagens[$idPergunta] ?>" class="img-responsive  img-tarefa center-block">
                            </div>
                        </div>
                    <?php } if ($alternativas[$idPergunta][0] == null || count($alternativas[$idPergunta]) < 4) {
                        ?>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group-lg">
                            <div class="form-group">
                                <input id="resposta" class="form-control" name="resp" type="text" id="formGroupInputLarge" aria-describedby="sizing-addon1" placeholder="Digite a resposta...">
                            </div>
                        </div>
                    <?php } else {
                        ?>
                        <div class="metro">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <?php
                                for ($i = 0; $i < 4; $i++) {
                                    if (substr($alternativas[$idPergunta][$i], 0, 13) == "view/uploads/") {
                                        ?>
                                        <div class="col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-0 col-xs-10 col-xs-offset-1 ">
                                            <input id="<?= $alternativas[$idPergunta][$i] ?>" name="resp" type="radio" value="<?= $alternativas[$idPergunta][$i] ?>" >
                                            <label for="<?= $alternativas[$idPergunta][$i] ?>"><img for="<?= $alternativas[$idPergunta][$i] ?>" src="<?= $alternativas[$idPergunta][$i] ?>" class="img-responsive" width="220px"></label>
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-md-3 col-md-offset-0 col-sm-3 col-sm-offset-0 col-xs-10 col-xs-offset-1 ">
                                            <input id="<?= $alternativas[$idPergunta][$i] ?>" name="resp" type = "radio" value = "<?= $alternativas[$idPergunta][$i] ?>" >
                                            <label for="<?= $alternativas[$idPergunta][$i] ?>"><?= $alternativas[$idPergunta][$i] ?></label>
                                        </div>
                                        <?php
                                    }
                                }
                                ?></div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <button id="ok" onclick="verificarResposta()" class="btn btn-primary btn-tarefa" >OK</button>
                    </div>
                    <script>
                        function verificarResposta() {
                            var tipo = document.querySelector("input[name=resp]").type;
                            var resposta = "<?= $respostas[$idPergunta] ?>".toUpperCase();
                            if (tipo == "radio") {
                                var r = document.querySelector("input[name=resp]:checked");
                                if (r == null){
                                    document.getElementById("mensagem").className = "alert alert-warning";
                                    document.getElementById("mensagem").innerHTML = "Escolha uma resposta!";
                                    mostraMensagem();
                                    document.getElementById("ok").setAttribute('onclick', "verificarResposta()");
                                    setTimeout('fechaMensagem()', 1000);
                                }else if (r.value.toUpperCase() == resposta.toUpperCase()) {
                                    document.getElementById("mensagem").className = "alert alert-success";
                                    document.getElementById("mensagem").innerHTML = "Resposta correta!";
                                    mostraMensagem();
                                    document.getElementById("progresso").style = "width: <?= $n * ($idPergunta + 1) ?>%";
                                    setTimeout(function () {
                                        window.location.href = 'index.php?classe=Tarefa&acao=gerarPerguntas&id=<?= $_GET["id"] ?>&idPergunta=<?= ($idPergunta + 1) ?>'
                                    }, 850);                                   
                                } else {
                                    document.getElementById("mensagem").className = "alert alert-danger";
                                    document.getElementById("mensagem").innerHTML = "Resposta incorreta!";
                                    mostraMensagem();
                                    document.getElementById("ok").setAttribute('onclick', "verificarResposta()");
                                    setTimeout('fechaMensagem()', 1000);
                                }
                            } else {
                                var r = document.querySelector("input[name=resp]").value;
                                if (r.toUpperCase() == resposta.toUpperCase()) {
                                    document.getElementById("mensagem").className = "alert alert-success";
                                    document.getElementById("mensagem").innerHTML = "Resposta correta!";
                                    mostraMensagem();
                                    document.getElementById("progresso").style = "width: <?= $n * ($idPergunta + 1) ?>%";
                                    setTimeout(function () {
                                        window.location.href = 'index.php?classe=Tarefa&acao=gerarPerguntas&id=<?= $_GET["id"] ?>&idPergunta=<?= ($idPergunta + 1) ?>'
                                    }, 1000);
                                } else if (r == "") {
                                    document.getElementById("mensagem").className = "alert alert-warning";
                                    document.getElementById("mensagem").innerHTML = "Digite uma resposta!";
                                    mostraMensagem();
                                    document.getElementById("ok").setAttribute('onclick', "verificarResposta()");
                                    setTimeout('fechaMensagem()', 1000);
                                } else {
                                    document.getElementById("mensagem").className = "alert alert-danger";
                                    document.getElementById("mensagem").innerHTML = "Resposta incorreta!";
                                    mostraMensagem();
                                    document.getElementById("ok").setAttribute('onclick', "verificarResposta()");
                                    setTimeout('fechaMensagem()', 1000);
                                }
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
        <?php
    } else {
        $idtarefa = $t->getId();
        $idaluno = $_SESSION["usuario"]->getId();
        TarefaController::atualizarVisibilidade($idaluno, $idtarefa);
        TarefaController::pontuarUsuario($idaluno, $idtarefa);
    }
}
?>


