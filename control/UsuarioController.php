<?php

ob_start();
require_once "model/UsuarioDAO.php";

class UsuarioController {

    public static function acessarsistema() {
        $email = $_POST["email"];
        $senha = md5($_POST["senha-login"]);

        $usuario = UsuarioDAO::autenticar($email, $senha);

        if ($usuario != null) {
            unset($_SESSION["popup"]);
            unset($_SESSION["erro"]);
            unset($_SESSION["alerta"]);
            $_SESSION["usuario"] = $usuario;
            header("Location: index.php");
        } else {
            $_SESSION["erro"] = "block";
			$_SESSION["email"] = $email;
            header("Location: index.php#acessar");
        }
        return false;
    }

    public static function inserir() {
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $opcao = $_POST["opcao"];

        if ($opcao == "aluno") {
            $usuario = new Usuario($nome, $sobrenome, $email, $senha, "view/assets/img/perfil.png", '0','');
            UsuarioDAO::insert($usuario);
            header("Location: index.php#acessar");
        } else if ($opcao == "professor") {
            $usuario = new Usuario($nome, $sobrenome, $email, $senha, 'view/assets/img/perfil.png','');
            UsuarioDAO::insert($usuario);
            header("Location: index.php#acessar");
        }
    }

    public static function recuperar() {
        $u = UsuarioDAO::getById($_GET["id"]);
        require_once 'view/editarUsuario.php';
    }

    public static function editar() {
        $id = $_GET["id"];
        $u = UsuarioDAO::getById($id);

        if (isset($_POST["senha_antiga"])) {
            $senhaantiga = md5($_POST["senha_antiga"]);
            $senha = md5($_POST["senha"]);
            if ($senhaantiga == $u->getSenha()) {
                $usuario = new Usuario("", "", "", $senha, "", "","", $id);
                UsuarioDAO::update($usuario);
            } else {
                echo "<script>alert('Senha antiga incorreta!')</script>";
            }
        } else {
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            if (isset($_POST["descricao"])) {
                $descricao = $_POST["descricao"];
            } else {
                $descricao = "";
            }

            $nomeArquivo = $_FILES['imagem']['name'];
            $tipo = strrchr($nomeArquivo, ".");
            if ($nomeArquivo == "") {
                $novoNome = "";
            } else {
                $novoNome = "view/uploads/" . time() . $tipo;
            }
            if (move_uploaded_file($_FILES['imagem']['tmp_name'], $novoNome)) {
                if ($u->getImagem() != "view/assets/img/perfil.png") {
                    unlink($img = $u->getImagem());
                }
                $usuario = new Usuario($nome, $sobrenome, "", "", $novoNome, $u->getDesempenho(), $descricao, $id);
                UsuarioDAO::update($usuario);
            } else {
                $usuario = new Usuario($nome, $sobrenome, "", "", $novoNome, $u->getDesempenho(), $descricao, $id);
                UsuarioDAO::update($usuario);
            }
        }

        $u2 = UsuarioDAO::getById($id);
        $_SESSION["usuario"] = $u2;
        UsuarioController::recuperar();
    }

    public static function verificarPontuacao(Usuario $usuario) {
        $idaluno = $usuario->getId();
        $tarefasCumpridas = Array();
        $tarefasNaoCumpridas = Array();
        $TarefasAluno = AlunoTarefaDAO::getByIdAluno($idaluno);
        $numTarefas = count($TarefasAluno);

        foreach ($TarefasAluno as $ta) {
            if ($ta->getConcluida() == 1) {
                array_push($tarefasCumpridas, $ta);
            } else {
                array_push($tarefasNaoCumpridas, $ta);
            }
        }
        $numTarefasNaoCump = count($tarefasNaoCumpridas);
        $numTarefasCumpridas = count($tarefasCumpridas);
        $aluno = UsuarioDAO::getById($idaluno);
        $desempenho = (100 * $numTarefasCumpridas) / $numTarefas;
        if ($_SESSION["usuario"]->getDesempenho() == $aluno->getDesempenho() && $numTarefasNaoCump != 0) {
            UsuarioDAO::updateDesempenho($aluno, $desempenho);
            $_SESSION["usuario"] = UsuarioDAO::getById($idaluno);
        }
    }

    public static function listaralunos() {
        UsuarioController::limitaracesso();
        $alunos = UsuarioDAO::getAlunosDesc();
        require_once 'view/listarAlunos.php';
    }

    public static function excluir() {
        $id = $_GET["id"];
        if (UsuarioDAO::getById($id)) {
            $u = UsuarioDAO::getById($id);
            if ($u->getImagem() != null && $u->getImagem() != "view/assets/img/perfil.png") {
                unlink($img = $u->getImagem());
            }
            if ($u->getDesempenho() != null) {
                AlunoTarefaDAO::deleteByIdAluno($id);
            }
            UsuarioDAO::delete($id);
            unset($_SESSION["usuario"]);
            unset($_SESSION["erro"]);
            header("Location: index.php");
        }
    }

    public static function sair() {
        unset($_SESSION["usuario"]);
        unset($_SESSION["erro"]);
        header("Location: index.php");
    }

    public static function sobre() {
        require_once 'view/sobre.php';
    }

    public static function limitaracesso() {
        if ($_SESSION["usuario"]->getDesempenho() != NULL) {
            header("Location: index.php");
        }
    }

}
