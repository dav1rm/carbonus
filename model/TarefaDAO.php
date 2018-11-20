<?php

require_once("Conexao.php");
require_once("Tarefa.php");

class TarefaDAO {

    public static function insert(Tarefa $tarefa) {

        $con = Conexao::connect();

        $nome = $tarefa->getNome();
        $idprofessor = $tarefa->getIdprofessor();
        $nivel = $tarefa->getNivel();

        $comando = "INSERT into tarefa (idprofessor, nome, nivel)";
        $comando .= "VALUES ('$idprofessor','$nome','$nivel')";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no insert: " . mysqli_error($con);
        }
    }

    public static function update(Tarefa $tarefa) {

        $con = Conexao::connect();

        $id = $tarefa->getId();
        $idprofessor = $tarefa->getIdprofessor();
        $nome = $tarefa->getNome();
        $nivel = $tarefa->getNivel();

        $comando = " UPDATE tarefa ";
        $comando .= "SET idprofessor = '$idprofessor', nome = '$nome', nivel = '$nivel'";
        $comando .= " WHERE id = $id";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        }
    }

    public static function delete($id) {

        $con = Conexao::connect();

        $comando = " DELETE FROM tarefa ";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        }
    }

    public static function getAll() {

        $con = Conexao::connect();

        $comando = " SELECT * FROM tarefa ";
        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todasAsTarefas = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umaTarefa = new Tarefa($reg["idprofessor"], $reg["nome"], $reg["nivel"], $reg["id"]);
                array_push($todasAsTarefas, $umaTarefa);
            }
            return $todasAsTarefas;
        }
        return null;
    }

    public static function getById($id) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM tarefa";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $reg = mysqli_fetch_array($resultado);
            $umaTarefa = new Tarefa($reg["idprofessor"], $reg["nome"], $reg["nivel"], $reg["id"]);
            return $umaTarefa;
        }
        return null;
    }

}