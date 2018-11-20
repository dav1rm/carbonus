<?php

require_once("Conexao.php");
require_once("CompostoTarefa.php");

class CompostoTarefaDAO {

    public static function insert(CompostoTarefa $compostoTarefa) {

        $con = Conexao::connect();

        $idcomposto = $compostoTarefa->getIdComposto();
        $idtarefa = $compostoTarefa->getIdTarefa();

        $comando = "INSERT into composto_tarefa (idcomposto, idtarefa)";
        $comando .= "VALUES ('$idcomposto','$idtarefa')";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no insert: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function update(CompostoTarefa $compostoTarefa) {

        $con = Conexao::connect();

        $idcomposto = $compostoTarefa->getIdComposto();
        $idtarefa = $compostoTarefa->getIdTarefa();

        $comando = " UPDATE composto_tarefa ";
        $comando .= "SET idcomposto = '$idcomposto'";
        $comando .= " WHERE idtarefa = $idtarefa ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function delete($id) {

        $con = Conexao::connect();

        $comando = " DELETE FROM composto_tarefa ";
        $comando .= " WHERE idtarefa = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function getAll() {

        $con = Conexao::connect();

        $comando = " SELECT * FROM composto_tarefa ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todasOsCompostosTarefas = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umCompostoTarefa = new CompostoTarefa($reg["idcomposto"], $reg["idtarefa"]);
                array_push($todasOsCompostosTarefas, $umCompostoTarefa);
            }
            return $todasOsCompostosTarefas;
        }
        return null;
    }

    public static function getById($id) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM composto_tarefa";
        $comando .= " WHERE idtarefa = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $reg = mysqli_fetch_array($resultado);
            $umCompostoTarefa = new CompostoTarefa($reg["idcomposto"], $reg["idtarefa"]);
            return $umCompostoTarefa;
        }
    }

    public static function getCompostoByIdTarefa($id) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM composto_tarefa ";
        $comando .= " WHERE idtarefa = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $reg = mysqli_fetch_array($resultado);
            $Compostotarefa = new CompostoTarefa($reg["idcomposto"], $reg["idtarefa"]);
            $composto = CompostoDAO::getById($Compostotarefa->getIdComposto());
            return $composto;
        }
        return null;
    }

}
