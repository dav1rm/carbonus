<?php

require_once("Conexao.php");
require_once("AlunoTarefa.php");

class AlunoTarefaDAO {

    public static function insert(AlunoTarefa $alunotarefa) {

        $con = Conexao::connect();

        $idaluno = $alunotarefa->getIdaluno();
        $idtarefa = $alunotarefa->getIdtarefa();
        $concluida = $alunotarefa->getConcluida();

        $comando = "INSERT into aluno_tarefa (idaluno, idtarefa, concluida)";
        $comando .= "VALUES ('$idaluno','$idtarefa','$concluida')";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no insert: " . mysqli_error($con);
        }
    }

    public static function update(AlunoTarefa $alunotarefa) {

        $con = Conexao::connect();

        $idaluno = $alunotarefa->getIdaluno();
        $idtarefa = $alunotarefa->getIdtarefa();

        $comando = " UPDATE aluno_tarefa ";
        $comando .= " SET idaluno = '$idaluno'";
        $comando .= " WHERE idtarefa = $idtarefa";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        }
    }

    public static function updateVisibilidade(AlunoTarefa $alunotarefa) {

        $con = Conexao::connect();

        $idaluno = $alunotarefa->getIdaluno();
        $idtarefa = $alunotarefa->getIdtarefa();

        $comando = " UPDATE aluno_tarefa ";
        $comando .= " SET  concluida = '1'";
        $comando .= " WHERE idtarefa = $idtarefa AND idaluno = $idaluno";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        }
    }

    public static function getAll() {

        $con = Conexao::connect();

        $comando = " SELECT * FROM aluno_tarefa ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsAlunosTarefa = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umAlunoTarefa = new AlunoTarefa($reg["idaluno"], $reg["idtarefa"], $reg["concluida"]);
                array_push($todosOsAlunosTarefa, $umAlunoTarefa);
            }
            return $todosOsAlunosTarefa;
        }
        return null;
    }

    public static function deleteByIdTarefa($id) {

        $con = Conexao::connect();

        $comando = " DELETE FROM aluno_tarefa ";
        $comando .= " WHERE idtarefa = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function deleteByIdAlunoAndIdTarefa($idaluno, $idtarefa) {

        $con = Conexao::connect();

        $comando = " DELETE FROM aluno_tarefa ";
        $comando .= " WHERE idaluno = $idaluno AND idtarefa= $idtarefa";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function deleteByIdAluno($idaluno) {

        $con = Conexao::connect();

        $comando = " DELETE FROM aluno_tarefa ";
        $comando .= " WHERE idaluno = $idaluno";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function getByIdTarefa($idtarefa) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM aluno_tarefa ";
        $comando .= " WHERE idtarefa = $idtarefa ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsAlunosTarefa = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umAlunoTarefa = new AlunoTarefa($reg["idaluno"], $reg["idtarefa"], $reg["concluida"]);
                array_push($todosOsAlunosTarefa, $umAlunoTarefa);
            }
            return $todosOsAlunosTarefa;
        }
        return null;
    }

    public static function getByIdAluno($idaluno) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM aluno_tarefa ";
        $comando .= " WHERE idaluno = $idaluno ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsAlunosTarefa = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umAlunoTarefa = new AlunoTarefa($reg["idaluno"], $reg["idtarefa"], $reg["concluida"]);
                array_push($todosOsAlunosTarefa, $umAlunoTarefa);
            }
            return $todosOsAlunosTarefa;
        }
        return null;
    }

    public static function getByIdAlunoAndIdTarefa($idaluno, $idtarefa) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM aluno_tarefa ";
        $comando .= " WHERE idaluno = $idaluno AND idtarefa = $idtarefa";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $reg = mysqli_fetch_array($resultado);
            $umAlunoTarefa = new AlunoTarefa($reg["idaluno"], $reg["idtarefa"], $reg["concluida"]);
            return $umAlunoTarefa;
        }
        return null;
    }

}

?>