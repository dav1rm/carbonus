<?php

require_once("Conexao.php");
require_once("Ramificacao.php");

class RamificacaoDAO {

    public static function insert(Ramificacao $ramificacao) {

        $con = Conexao::connect();

        $nome = $ramificacao->getNome();

        $comando = "INSERT into ramificacao (nome)";
        $comando .= "VALUES ('$nome')";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no insert: " . mysqli_error($con);
        } else {
            echo "<br/>Dados inseridos com sucesso!";
        }
    }

    public static function update(Ramificacao $ramificacao) {

        $con = Conexao::connect();

        $nome = $ramificacao->getNome();
        $id = $ramificacao->getId();

        $comando = " UPDATE ramificacao ";
        $comando .= "SET nome = '$nome'";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no update: " . mysqli_error($con);
        }
    }

    public static function delete($id) {

        $con = Conexao::connect();

        $comando = " DELETE FROM ramificacao ";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no delete: " . mysqli_error($con);
        }
    }

    public static function getAll() {

        $con = Conexao::connect();

        $comando = " SELECT * FROM ramificacao ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $todasAsRamificacoes = array();
            while ($reg = mysqli_fetch_array($resultado)) {
                $umaRamificacao = new Ramificacao($reg["nome"], $reg["id"]);
                array_push($todasAsRamificacoes, $umaRamificacao);
            }
            return $todasAsRamificacoes;
        }
        return null;
    }

    public static function getRamificacaoById($id) {

        $con = Conexao::connect();

        $comando = " SELECT * FROM ramificacao";
        $comando .= " WHERE id = $id ";

        $resultado = mysqli_query($con, $comando);

        if (!$resultado) {
            echo "<br/>Erro no select: " . mysqli_error($con);
        } else {
            $reg = mysqli_fetch_array($resultado);
            $umaRamificacao = new Ramificacao($reg["nome"], $reg["id"]);
            return $umaRamificacao;
        }
        return null;
    }

}
