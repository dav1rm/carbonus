<?php

require_once("Conexao.php");
require_once("Composto.php");

class CompostoDAO {

    public static function insert(Composto $composto) {

        $con = Conexao::connect();

        $nomenclatura = $composto->getNomenclatura();
        $funcaoOrganica = $composto->getFuncaoOrganica();
        $formulaMolecular = $composto->getFormulaMolecular();
        $formulaEstrutural = $composto->getFormulaEstrutural();
        $Subgrupo = $composto->getSubgrupo();

        $comando = "INSERT into composto (nomenclatura, funcaoorganica, formulamolecular, formulaestrutural, subgrupo)";
        $comando .= "VALUES ('$nomenclatura', '$funcaoOrganica','$formulaMolecular', '$formulaEstrutural','$Subgrupo')";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no insert: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function selectSemelhanteNomen(Composto $composto) {

        $con = Conexao::connect();

        $a = $composto->getNomenclatura();
        $valor = strpos($a, "-");

        if ($valor != false) {
            $remover = array("metil", "etil", "propil", "butil", "benzil", "isopropril", "fenil", "isobutil", "secbutil", "tercbutil", "enol", "anol", "inol", "eno", "ano", "ino", "1", "2", "3", "4", "5", "6", "7", "8", "9", "-", ",", "tri", "di", "tetra", "a");
            $texto = str_replace($remover, "", $composto->getNomenclatura());

            $comando = " SELECT * FROM composto";
            $comando .= " WHERE (nomenclatura LIKE '%$texto%') AND (nomenclatura <> '$a')";
        } else {

            $remover = array("iso", "ciclo", "enol", "anol", "inol", "eno", "ano", "ino");
            $texto = str_replace($remover, "", $composto->getNomenclatura());

            $comando = " SELECT * FROM composto";
            $comando .= " WHERE (nomenclatura LIKE '%$texto%') AND (nomenclatura <> '$a')";
        }

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsCompostos = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umComposto = new Composto($reg["nomenclatura"], $reg["funcaoorganica"], $reg["formulamolecular"], $reg["formulaestrutural"], $reg["subgrupo"], $reg["id"]);
                array_push($todosOsCompostos, $umComposto);
            }
            return $todosOsCompostos;
        }
        return null;
    }

    public static function selectSemelhanteForMol(Composto $composto) {

        $con = Conexao::connect();

        $FM = $composto->getFormulaMolecular();
        $texto = substr($FM, 0, 3);

        $comando = " SELECT * FROM composto";
        $comando .= " WHERE (formulamolecular LIKE '" . $texto . "%') AND (formulamolecular <> '$FM')";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsCompostos = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umComposto = new Composto($reg["nomenclatura"], $reg["funcaoorganica"], $reg["formulamolecular"], $reg["formulaestrutural"], $reg["subgrupo"], $reg["id"]);
                array_push($todosOsCompostos, $umComposto);
            }
            return $todosOsCompostos;
        }
        return null;
    }

    public static function update(Composto $composto) {

        $con = Conexao::connect();

        $id = $composto->getId();
        $nomenclatura = $composto->getNomenclatura();
        $funcaoOrganica = $composto->getFuncaoOrganica();
        $formulaMolecular = $composto->getFormulaMolecular();
        $formulaEstrutural = $composto->getFormulaEstrutural();
        $Subgrupo = $composto->getSubgrupo();

        $comando = " UPDATE composto ";
        if ($formulaEstrutural == "") {
            $comando .= "SET nomenclatura = '$nomenclatura', funcaoorganica = '$funcaoOrganica', formulamolecular = '$formulaMolecular', subgrupo = '$Subgrupo'";
        } else {
            $comando .= "SET nomenclatura = '$nomenclatura', funcaoorganica = '$funcaoOrganica', formulamolecular = '$formulaMolecular', formulaestrutural = '$formulaEstrutural', subgrupo = '$Subgrupo'";
        }
        $comando .= " WHERE id = $id";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function delete($id) {

        $con = Conexao::connect();

        $comando = " DELETE FROM composto ";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        } else {
            echo "";
        }
    }

    public static function getAll() {

        $con = Conexao::connect();

        $comando = " SELECT * FROM composto ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todosOsCompostos = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umComposto = new Composto($reg["nomenclatura"], $reg["funcaoorganica"], $reg["formulamolecular"], $reg["formulaestrutural"], $reg["subgrupo"], $reg["id"]);
                array_push($todosOsCompostos, $umComposto);
            }
            return $todosOsCompostos;
        }
        return null;
    }

    public static function getById($id) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM composto";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $reg = mysqli_fetch_array($resultado);
            $umComposto = new Composto($reg["nomenclatura"], $reg["funcaoorganica"], $reg["formulamolecular"], $reg["formulaestrutural"], $reg["subgrupo"], $reg["id"]);
            return $umComposto;
        }
        return null;
    }

}
