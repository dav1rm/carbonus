<?php

require_once("Conexao.php");
require_once("CompostoRamificacao.php");

class CompostoRamificacaoDAO {

    public static function insert(CompostoRamificacao $compostoRamificacao) {

        $con = Conexao::connect();

        $idcomposto = $compostoRamificacao->getIdComposto();
        $idramificacao = $compostoRamificacao->getIdRamificacao();

        $comando = "INSERT into composto_ramificacao (idcomposto, idramificacao)";
        $comando .= "VALUES ('$idcomposto', '$idramificacao')";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no insert: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function update(CompostoRamificacao $compostoRamificacao) {

        $con = Conexao::connect();

        $idcomposto = $compostoRamificacao->getIdComposto();
        $idramificacao = $compostoRamificacao->getIdRamificacao();

        $comando = " UPDATE composto_ramificacao ";
        $comando .= "SET idramificacao = '$idramificacao'";
        $comando .= " WHERE idcomposto = $idcomposto ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function delete($id) {

        $con = Conexao::connect();

        $comando = " DELETE FROM composto_ramificacao ";
        $comando .= " WHERE idcomposto = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function getAll() {

        $con = Conexao::connect();

        $comando = " SELECT * FROM composto_ramificacao ";
        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todasOsCompostosRamificacoes = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umCompostoRamificacao = new CompostoRamificacao($reg["idcomposto"], $reg["idramificacao"]);
                array_push($todasOsCompostosRamificacoes, $umCompostoRamificacao);
            }
            return $todasOsCompostosRamificacoes;
        }
        return null;
    }

    public static function getByIdComposto($id) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM composto_ramificacao";
        $comando .= " WHERE idcomposto = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todasOsCompostosRamificacoes = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umCompostoRamificacao = new CompostoRamificacao($reg["idcomposto"], $reg["idramificacao"]);
                array_push($todasOsCompostosRamificacoes, $umCompostoRamificacao);
            }
            return $todasOsCompostosRamificacoes;
        }
        return null;
    }

}
