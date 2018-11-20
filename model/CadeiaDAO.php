<?php

require_once("Conexao.php");
require_once("Cadeia.php");

class CadeiaDAO {

    public static function insert(Cadeia $cadeia) {

        $con = Conexao::connect();
        
        $tipo = $cadeia->getTipo();

        $comando = "INSERT into cadeia (tipo)";
        $comando .= "VALUES ('$tipo')";
        
        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no insert: " . mysqli_error($con);
        } else {
            echo "<br/>Dados inseridos com sucesso!";
        }
    }

    public static function update(Cadeia $cadeia) {

        $con = Conexao::connect();
        
        $tipo = $cadeia->getTipo();
        
        $id = $cadeia->getId();

        $comando = " UPDATE cadeia ";
        $comando .= "SET tipo = '$tipo'";
        $comando .= " WHERE id = $id ";
        
        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        } else {
            echo "<br/>Dados atualizados com sucesso!";
        }
    }

    public static function delete($id) {

        $con = Conexao::connect();
        
        $comando = " DELETE FROM cadeia ";
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
        
        $comando = " SELECT * FROM cadeia ";
        
        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todasAsCadeias = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umaCadeia = new Cadeia($reg["tipo"], $reg["id"]);
                array_push($todasAsCadeias, $umaCadeia);
            }
            return $todasAsCadeias;
        }
        return null;
    }

    public static function getCadeiaById($id) {

        $con = Conexao::connect();
        
        $comando = " SELECT * FROM cadeia";
        $comando .= " WHERE id = $id ";
        
        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $reg = mysqli_fetch_array($resultado);
            $umaCadeia = new Cadeia($reg["tipo"], $reg["id"]);
            return $umaCadeia;
        }
        return null;
    }
}
