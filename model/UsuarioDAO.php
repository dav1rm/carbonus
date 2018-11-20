<?php

require_once("Conexao.php");
require_once("Usuario.php");
require_once("AlunoTarefaDAO.php");

class UsuarioDAO {

    public static function autenticar($email, $senha) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM usuario ";
        $comando .= " WHERE email = '$email' AND senha = '$senha'";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $reg = mysqli_fetch_array($resultado);
            if ($reg != null) {
                $umUsuario = new Usuario($reg["nome"], $reg["sobrenome"], $reg["email"], $reg["senha"], $reg["imagem"], $reg["desempenho"], $reg["descricao"], $reg["id"]);
                return $umUsuario;
            }
        }
        return null;
    }

    public static function insert(Usuario $usuario) {

        $con = Conexao::connect();

        $nome = $usuario->getNome();
        $sobrenome = $usuario->getSobrenome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $imagem = $usuario->getImagem();
        $desempenho = $usuario->getDesempenho();

        $comando1 = "SELECT * FROM usuario WHERE email = '$email'";

        $procura = mysqli_query($con, $comando1);

        if (!$procura)
            die("Execução de consulta gerou o seguinte erro no MYSQL-->" . mysqli_error($con));
        if (mysqli_num_rows($procura) >= 1) {
            $_SESSION["alerta"] = "block";
			$_SESSION["nome"] = $nome;
			$_SESSION["sobrenome"] = $sobrenome;
			$_SESSION["email1"] = $email;
			
        } else {
            if ($desempenho == null) {

                $comando = "INSERT into usuario (nome, sobrenome, email, senha, imagem)";
                $comando .= "VALUES ('$nome','$sobrenome','$email', '$senha', '$imagem')";
            } else {

                $comando = "INSERT into usuario (nome, sobrenome, email, senha, imagem, desempenho)";
                $comando .= "VALUES ('$nome','$sobrenome','$email', '$senha', '$imagem', '$desempenho')";
            }

            $resultado = mysqli_query($con, $comando);

            if (!$resultado) {
                echo "<br/>Erro no insert: " . mysqli_error($con);
            } else {
                $_SESSION["popup"] = "block";
            }
        }
    }

    public static function update(Usuario $usuario) {

        $con = Conexao::connect();

        $nome = $usuario->getNome();
        $sobrenome = $usuario->getSobrenome();
        $senha = $usuario->getSenha();
        $imagem = $usuario->getImagem();
        $descricao = $usuario->getDescricao();
        $id = $usuario->getId();

        $comando = "UPDATE usuario ";
        if ($senha != "") {
            $comando .= " SET senha = '$senha'";
        } else {
            if ($imagem == "") {
                $comando .= " SET nome = '$nome', sobrenome = '$sobrenome', descricao = '$descricao'";
            } else {
                $comando .= " SET nome = '$nome', sobrenome = '$sobrenome', imagem = '$imagem', descricao = '$descricao'";
            }
        }
        $comando .= " WHERE id = $id ";
        
        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        }
    }

    public static function updateDesempenho(Usuario $usuario, $desempenho) {

        $con = Conexao::connect();

        $id = $usuario->getId();

        $comando = " UPDATE usuario ";
        $comando .= " SET desempenho = '$desempenho'";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        }
    }

    public static function delete($id) {

        $con = Conexao::connect();

        $comando = " DELETE FROM usuario ";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        }
    }

    public static function getAll() {

        $con = Conexao::connect();

        $comando = " SELECT * FROM usuario ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsUsuarios = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umUsuario = new Usuario($reg["nome"], $reg["sobrenome"], $reg["email"], $reg["senha"], $reg["imagem"], $reg["desempenho"], $reg["descricao"], $reg["id"]);
                array_push($todosOsUsuarios, $umUsuario);
            }
            return $todosOsUsuarios;
        }
        return null;
    }

    public static function getAlunos() {

        $con = Conexao::connect();

        $comando = " SELECT * FROM usuario ";
        $comando .= "WHERE desempenho IS NOT null ORDER BY nome ASC";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsAlunos = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umAluno = new Usuario($reg["nome"], $reg["sobrenome"], $reg["email"], $reg["senha"], $reg["imagem"], $reg["desempenho"], $reg["descricao"], $reg["id"]);
                array_push($todosOsAlunos, $umAluno);
            }
            return $todosOsAlunos;
        }
        return null;
    }
	
	public static function getAlunosDesc() {

        $con = Conexao::connect();

        $comando = " SELECT * FROM usuario ";
        $comando .= "WHERE desempenho IS NOT null ORDER BY desempenho DESC";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsAlunos = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umAluno = new Usuario($reg["nome"], $reg["sobrenome"], $reg["email"], $reg["senha"], $reg["imagem"], $reg["desempenho"], $reg["descricao"], $reg["id"]);
                array_push($todosOsAlunos, $umAluno);
            }
            return $todosOsAlunos;
        }
        return null;
    }

    public static function getById($id) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM usuario ";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $reg = mysqli_fetch_array($resultado);
            $umUsuario = new Usuario($reg["nome"], $reg["sobrenome"], $reg["email"], $reg["senha"], $reg["imagem"], $reg["desempenho"], $reg["descricao"], $reg["id"]);
            return $umUsuario;
        }
        return null;
    }

}

?>