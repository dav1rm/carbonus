<?php

require_once("Conexao.php");
require_once("CompostoCadeia.php");

class CompostoCadeiaDAO {

    public static function insert(CompostoCadeia $compostoCadeia) {

        $con = Conexao::connect();

        $idcomposto = $compostoCadeia->getIdComposto();
        $idcadeia = $compostoCadeia->getIdCadeia();

        $comando = "INSERT into composto_cadeia (idcomposto, idcadeia)";
        $comando .= "VALUES ('$idcomposto', '$idcadeia')";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no insert: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function update(CompostoCadeia $compostoCadeia) {

        $con = Conexao::connect();

        $idcomposto = $compostoCadeia->getIdComposto();
        $idcadeia = $compostoCadeia->getIdCadeia();

        $comando = " UPDATE composto_cadeia ";
        $comando .= "SET idcadeia = '$idcadeia'";
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

        $comando = " DELETE FROM composto_cadeia ";
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

        $comando = " SELECT * FROM composto_cadeia ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todasOsCompostosCadeias = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umCompostoCadeia = new CompostoCadeia($reg["idcomposto"], $reg["idcadeia"]);
                array_push($todasOsCompostosCadeias, $umCompostoCadeia);
            }
            return $todasOsCompostosCadeias;
        }
        return null;
    }

    public static function getByIdComposto($id) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM composto_cadeia";
        $comando .= " WHERE idcomposto = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todasOsCompostosCadeias = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umCompostoCadeia = new CompostoCadeia($reg["idcomposto"], $reg["idcadeia"]);
                array_push($todasOsCompostosCadeias, $umCompostoCadeia);
            }
            return $todasOsCompostosCadeias;
        }
        return null;
    }

}
