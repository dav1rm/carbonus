<?php

require_once ("model/TarefaDAO.php");
require_once ("model/CompostoTarefaDAO.php");
require_once ("model/CompostoDAO.php");
require_once ("model/CadeiaDAO.php");
require_once ("model/RamificacaoDAO.php");
require_once ("model/CompostoCadeiaDAO.php");
require_once ("model/CompostoRamificacaoDAO.php");

class TarefaController {

    public static function gerarPerguntas() {
        $questoes = array();
        $respostas = array();
        $alternativas = array();
        $imagens = array();

        $composto = CompostoTarefaDAO::getCompostoByIdTarefa($_GET["id"]);
        $cadeias = CompostoCadeiaDAO::getByIdComposto($composto->getId());
        $ramificacoes = CompostoRamificacaoDAO::getByIdComposto($composto->getId());

        if (isset($composto)) {
            if ($composto->getNomenclatura() != null) {
                $compostos = CompostoDAO::selectSemelhanteNomen($composto);
                $r1 = strtolower($composto->getNomenclatura());
                $alt = array();
                $valor = strpos($r1, "-"); //verifica se nomenclatura possi "-"
                $n = "";
                $sufixo = array("metil", "etil", "propil", "butil", "benzil", "isopropril", "fenil", "isobutil", "secbutil", "tercbutil", "enol", "anol", "inol", "eno", "ano", "ino", "1", "2", "3", "4", "5", "6", "7", "8", "9", "-", ",", "tri", "di", "tetra", "a");
                $remover = array("iso", "ciclo", "enol", "anol", "inol", "eno", "ano", "ino");
                if ($valor != false) {
                    $n = str_replace($sufixo, "", $r1); //remove os afixos
                } else {
                    $n = str_replace($remover, "", $r1); //remove os afixos
                }
                foreach ($compostos as $c) {
                    $a = strtolower($c->getNomenclatura());
                    $valor = strpos($a, "-");
                    if ($valor != false) { //se não tiver "-" na nomenclatura
                        $texto = str_replace($sufixo, "", $a);
                        if (strcasecmp(str_replace($sufixo, "", $texto), $n) == 0) { //compara dos prefixos sem diferenciar maiusculas e minusculas
                            array_push($alt, $c->getNomenclatura());
                        }
                    } else {
                        if (strcasecmp(str_replace($remover, "", $a), $n) == 0) { //compara dos prefixos sem diferenciar maiusculas e minusculas
                            array_push($alt, $c->getNomenclatura());
                        }
                    }
                }
                $alt = array_unique($alt);
                shuffle($alt);
                $alt = array_slice($alt, 0, 3); //Seleciona 3 nomenclaruras
                array_push($alt, $r1);
                shuffle($alt);
                $q1 = 'Qual a nomenclatura IUPAC do composto abaixo?';
                $i1 = $composto->getFormulaEstrutural();
                array_push($alternativas, $alt);
                array_push($questoes, $q1);
                array_push($respostas, $r1);
                array_push($imagens, $i1);
            }
            if ($composto->getFormulaMolecular() != null) {
                $perguntas = array();
                $w = "Qual é a formula molecular do " . $composto->getNomenclatura() . "?";
                array_push($perguntas, $w);
                $w1 = 'Qual é a formula molecular do composto abaixo?';
                array_push($perguntas, $w1);
                $q2 = $perguntas[array_rand($perguntas, 1)];
                $i2 = $composto->getFormulaEstrutural();
                $r2 = $composto->getFormulaMolecular();
                $compostos = CompostoDAO::selectSemelhanteForMol($composto);
                $alt = array();
                foreach ($compostos as $c) {
                    array_push($alt, $c->getFormulaMolecular());
                }
                $alt = array_unique($alt);
                shuffle($alt);
                $alt = array_slice($alt, 0, 3);  //Seleciona 3 nomenclaruras
                array_push($alt, $r2);
                shuffle($alt);
                array_push($alternativas, $alt);
                array_push($questoes, $q2);
                array_push($respostas, $r2);
                array_push($imagens, $i2);
            }
            if ($ramificacoes != null) {
                $ram = array();
                $ram2 = array();
                $todasramificacoes = RamificacaoDAO::getAll();
                foreach ($todasramificacoes as $r) {
                    array_push($ram, $r->getId());
                }
                foreach ($ramificacoes as $r) {
                    array_push($ram2, $r->getIdRamificacao());
                }
                $i6 = $composto->getFormulaEstrutural();
                $perguntas = array();
                $q6 = "Qual tipo de ramificação está presente no composto abaixo?";
                array_push($imagens, $i6);
                $y = RamificacaoDAO::getRamificacaoById($ram2[rand(0, count($ram2) - 1)]);
                $r6 = $y->getNome();
                $alt = array();
                foreach ($ram as $r) {
                    if (in_array($r, $ram2) != true) {
                        $a = RamificacaoDAO::getRamificacaoById($r);
                        array_push($alt, $a->getNome());
                    }
                }
                shuffle($alt);
                $alt = array_slice($alt, 0, 3);  //Seleciona 3 subgrupos
                array_push($alt, $r6);
                shuffle($alt);
                array_push($alternativas, $alt);
                array_push($respostas, $r6);
                array_push($imagens, $i6);
                array_push($questoes, $q6);
            }


            if ($cadeias != null) {
                $cad = array();
                $cad2 = array();
                $todasCad = CadeiaDAO::getAll();
                foreach ($todasCad as $t) {
                    array_push($cad, $t->getId());
                }
                foreach ($cadeias as $c) {
                    array_push($cad2, $c->getIdCadeia());
                }

                $i4 = $composto->getFormulaEstrutural();
                $perguntas = array();
                $w = "Qual o tipo de cadeia presente no " . $composto->getNomenclatura() . "?";
                array_push($perguntas, $w);
                $w1 = "Qual o tipo de cadeia presente no composto abaixo?";
                array_push($perguntas, $w1);
                $q4 = $perguntas[array_rand($perguntas, 1)];
                array_push($imagens, $i4);
                $y = CadeiaDAO::getCadeiaById($cad2[rand(0, count($cad2) - 1)]);
                $r4 = $y->getTipo();
                $alt = array();
                foreach ($cad as $c) {
                    if (in_array($c, $cad2) != true) {
                        $cad = CadeiaDAO::getCadeiaById($c);
                        array_push($alt, $cad->getTipo());
                    }
                }
                shuffle($alt);
                $alt = array_slice($alt, 0, 3);  //Seleciona 3 subgrupos
                array_push($alt, $r4);
                shuffle($alt);
                array_push($alternativas, $alt);
                array_push($respostas, $r4);
                array_push($imagens, $i4);
                array_push($questoes, $q4);
            }
            if ($composto->getFuncaoOrganica() == "Hidrocarbonetos") {
                $compostos = CompostoDAO::getAll();
                $i5 = $composto->getFormulaEstrutural();
                $perguntas = array();
                $w = "A qual subgrupo pertence o " . $composto->getNomenclatura() . "?";
                array_push($perguntas, $w);
                $w1 = "A qual subgrupo pertence o composto abaixo?";
                array_push($perguntas, $w1);
                $q5 = $perguntas[array_rand($perguntas, 1)];
                if ($q5 == "A qual subgrupo pertence o composto abaixo?") {
                    array_push($imagens, $i5);
                }
                $r5 = $composto->getSubgrupo();
                $alt = array();

                foreach ($compostos as $c) {
                    if ($c->getSubgrupo() != null && $c->getSubgrupo() != $r5) {
                        array_push($alt, $c->getSubgrupo());
                    }
                }
                $alt = array_unique($alt);
                shuffle($alt);
                $alt = array_slice($alt, 0, 3);  //Seleciona 3 subgrupos
                array_push($alt, $r5);
                shuffle($alt);
                array_push($imagens, $i5);
                array_push($alternativas, $alt);
                array_push($questoes, $q5);
                array_push($respostas, $r5);
            }
            if ($composto->getFormulaEstrutural() != null) {
                $compostos = CompostoDAO::selectSemelhanteNomen($composto);
                $nome = strtolower($composto->getNomenclatura());
                $alt = array();
                $valor = strpos($r1, "-"); //verifica se nomenclatura possi "-"
                $n = "";
                $sufixo = array("metil", "etil", "propil", "butil", "benzil", "isopropril", "fenil", "isobutil", "secbutil", "tercbutil", "enol", "anol", "inol", "eno", "ano", "ino", "1", "2", "3", "4", "5", "6", "7", "8", "9", "-", ",", "tri", "di", "tetra");
                $remover = array("iso", "ciclo", "enol", "anol", "inol", "eno", "ano", "ino");
                if ($valor != false) {
                    $n = str_replace($sufixo, "", $nome); //remove os afixos
                } else {
                    $n = str_replace($remover, "", $nome); //remove os afixos
                }
                foreach ($compostos as $c) {
                    $a = strtolower($c->getNomenclatura());
                    $valor = strpos($a, "-");
                    if ($valor != false) { //se não tiver "-" na nomenclatura
                        $texto = str_replace($sufixo, "", $a);
                        if (strcasecmp(str_replace($sufixo, "", $texto), $n) == 0) { //compara dos prefixos sem diferenciar maiusculas e minusculas
                            array_push($alt, $c->getFormulaEstrutural());
                        }
                    } else {
                        if (strcasecmp(str_replace($remover, "", $a), $n) == 0) { //compara dos prefixos sem diferenciar maiusculas e minusculas
                            array_push($alt, $c->getFormulaEstrutural());
                        }
                    }
                }
                $alt = array_unique($alt);
                $r3 = $composto->getFormulaEstrutural();
                shuffle($alt);
                $alt = array_slice($alt, 0, 3); //Seleciona 3 nomenclaruras
                array_push($alt, $r3);
                shuffle($alt);
                if (count($alt) >= 4) {
                    $q3 = "Qual é a formula estrutural do " . $composto->getNomenclatura() . "?";
                    array_push($alternativas, $alt);
                    array_push($questoes, $q3);
                    array_push($respostas, $r3);
                }
            }
        }
        $t = TarefaDAO::getById($_GET["id"]);
        $tamanho = sizeof($questoes);
        require_once 'view/tarefa.php';
    }

    public static function atualizarVisibilidade($idaluno, $idtarefa) {
        $alunotarefa = AlunoTarefaDAO::getByIdAlunoAndIdTarefa($idaluno, $idtarefa);
        AlunoTarefaDAO::updateVisibilidade($alunotarefa);
    }

    public static function pontuarUsuario($idaluno) {
        $tarefa = TarefaDAO::getById($_GET["id"]);
        $tarefasCumpridas = Array();

        $TarefasAluno = AlunoTarefaDAO::getByIdAluno($idaluno);
        $numTarefas = count($TarefasAluno);
        foreach ($TarefasAluno as $ta) {
            if ($ta->getConcluida() == 1) {
                array_push($tarefasCumpridas, $ta);
            }
        }
        $numTarefasCumpridas = count($tarefasCumpridas);
        $aluno = UsuarioDAO::getById($idaluno);
        $desempenho = (100 * $numTarefasCumpridas) / $numTarefas;
        UsuarioDAO::updateDesempenho($aluno, $desempenho);
        $_SESSION["usuario"] = UsuarioDAO::getById($idaluno);
        require_once 'view/tarefacumprida.php';
    }

    public static function listarTarefas() {

        $idaluno = $_SESSION["usuario"]->getId();
        $alunotarefas = AlunoTarefaDAO::getByIdAluno($idaluno);
        $tarefas = Array();
		$tarefasconcluidas = Array();

        foreach ($alunotarefas as $at) {
            if ($at->getConcluida() == 0) {
                $tarefa = TarefaDAO::getById($at->getIdtarefa());
                array_push($tarefas, $tarefa);
            }else{
				$tarefa = TarefaDAO::getById($at->getIdtarefa());
				array_push($tarefasconcluidas, $tarefa);
			}
        }
        require_once 'view/tarefas.php';
    }

    public static function inserirTarefa() {

        UsuarioController::limitaracesso();
        $idprofessor = $_GET["idprofessor"];
        $nome = $_POST["nome"];
        $nivel = $_POST["nivel"];
        if (isset($_POST["check"])) {
            $alunos = $_POST["check"];
        } else {
            $alunos = "";
        }
        $tarefa = new Tarefa($idprofessor, $nome, $nivel);
        TarefaDAO::insert($tarefa);
        $idtarefa = Conexao::lastId();
        if ($alunos != null) {
            foreach ($alunos as $a) {
                $alunotarefa = new AlunoTarefa($a, $idtarefa, 0);
                AlunoTarefaDAO::insert($alunotarefa);
            }
        }
        $idcomposto = $_POST["composto"];
        $compostoTarefa = new CompostoTarefa($idcomposto, $idtarefa);
        CompostoTarefaDAO::insert($compostoTarefa);

        TarefaController::cadastrarTarefa();
    }

    public static function cadastrarTarefa() {

        $alunos = UsuarioDAO::getAlunos();
        $compostos = CompostoDAO::getAll();
        require_once 'view/cadastrarTarefa.php';
    }

    public static function excluir() {

        UsuarioController::limitaracesso();
        $id = $_GET["id"];
        CompostoTarefaDAO::delete($id);
        AlunoTarefaDAO::deleteByIdTarefa($id);
        TarefaDAO::delete($id);
        TarefaController::cadastrarTarefa();
    }

    public static function recuperar() {
        UsuarioController::limitaracesso();
        $id = $_GET["id"];
        $tarefa = TarefaDAO::getById($id);
        $compostoTarefa = CompostoTarefaDAO::getById($tarefa->getId());
        $composto = CompostoDAO::getById($compostoTarefa->getIdComposto());
        $alunostarefas = AlunoTarefaDAO::getByIdTarefa($id);
        $todosalunos = UsuarioDAO::getAlunos();
        $alunos = Array();
        foreach ($alunostarefas as $at) {
            $aluno = UsuarioDAO::getById($at->getIdaluno());
            array_push($alunos, $aluno->getId());
        }
        $compostos = CompostoDAO::getAll();

        require_once 'view/editarTarefa.php';
    }

    public static function editar() {
        UsuarioController::limitaracesso();

        $nome = $_POST["nome"];
        $id = $_GET["id"];
        $idprofessor = $_SESSION["usuario"]->getId();
        $idcomposto = $_POST["composto"];
        if (isset($_POST["check"])) {
            $alunos = $_POST["check"];
        } else {
            $alunos = "";
        }
        $nivel = $_POST["nivel"];
        $tarefa = new Tarefa($idprofessor, $nome, $nivel, $id);
        TarefaDAO::update($tarefa);
        $alunostarefas = AlunoTarefaDAO::getByIdTarefa($id);
        $alunostarefaarray = Array();
        foreach ($alunostarefas as $at) {
            array_push($alunostarefaarray, $at->getIdaluno());
        }
        if ($alunos != null) {
            foreach ($alunos as $a) {
                if (!in_array($a, $alunostarefaarray)) {
                    $alunotarefa = new AlunoTarefa($a, $id, 0);
                    AlunoTarefaDAO::insert($alunotarefa);
                }
            }foreach ($alunostarefaarray as $a) {
                if (!in_array($a, $alunos)) {
                    AlunoTarefaDAO::deleteByIdAlunoAndIdTarefa($a, $id);
                }
            }
        } else {
            AlunoTarefaDAO::deleteByIdTarefa($id);
        }
        $compostoTarefa = new CompostoTarefa($idcomposto, $id);
        CompostoTarefaDAO::update($compostoTarefa);

        TarefaController::recuperar();
    }

}
