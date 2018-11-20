<?php

require_once ("model/CompostoDAO.php");
require_once ("model/CadeiaDAO.php");
require_once ("model/RamificacaoDAO.php");
require_once ("model/CompostoCadeiaDAO.php");
require_once ("model/CompostoRamificacaoDAO.php");

class CompostoController {

    public static function inserirComposto() {
        UsuarioController::limitaracesso();
        $nomeImagem = $_FILES['formulaestrutural']['name'];
        $tipo = strrchr($nomeImagem, ".");
        $nomenclatura = $_POST["nomenclatura"];
        $funcaoOrganica = $_POST["funcaoorganica"];
        $formulaMolecular = $_POST["formulamolecular"];

        if (isset($_POST["subgrupo"])) {
            $Subgrupo = $_POST["subgrupo"];
        } else {
            $Subgrupo = null;
        }
        if (isset($_POST["cadeia"])) {
            $cadeia = $_POST["cadeia"];
        }
        if (isset($_POST["ramificacao"])) {
            $ramificacao = $_POST["ramificacao"];
        } else if (isset($_POST["cadeia"])) {
            $indice = array_search('1', $cadeia);
            if ($indice !== false) {
                unset($cadeia[$indice]);
            }
        }
        $novoNome = "view/uploads/" . time() . $tipo;
        
        if (move_uploaded_file($_FILES['formulaestrutural']['tmp_name'], $novoNome)) {
            $composto = new Composto($nomenclatura, $funcaoOrganica, $formulaMolecular, $novoNome, $Subgrupo);
            CompostoDAO::insert($composto);
        }

        $idComposto = Conexao::lastId();

        if (isset($cadeia)) {
            foreach ($cadeia as $c) {
                $compostoCadeia = new CompostoCadeia($idComposto, $c);
                CompostoCadeiaDAO::insert($compostoCadeia);
            }
        }

        if (isset($ramificacao)) {
            foreach ($ramificacao as $r) {
                $compostoRamificacao = new CompostoRamificacao($idComposto, $r);
                CompostoRamificacaoDAO::insert($compostoRamificacao);
            }
        }
        CompostoController::cadastrarComposto();
    }

    public static function cadastrarComposto() {
        $compostos = CompostoDAO::getAll();
        require_once 'view/cadastrarComposto.php';
    }

    public static function excluir() {
        UsuarioController::limitaracesso();
        $id = $_GET["id"];
        $c = CompostoDAO::getById($id);
        if ($c->getFormulaEstrutural() != null) {
            unlink($img = $c->getFormulaEstrutural());
        }
        CompostoCadeiaDAO::delete($id);
        CompostoRamificacaoDAO::delete($id);
        CompostoDAO::delete($id);
        CompostoController::cadastrarComposto();
    }

    public static function detalhesComposto() {
        $id = $_GET["id"];
        $composto = CompostoDAO::getById($id);
        $compostoscadeias = CompostoCadeiaDAO::getByIdComposto($id);
        $compostosramificacoes = CompostoRamificacaoDAO::getByIdComposto($id);
        $todasramificacoes = array();
        $todascadeias = array();
        foreach ($compostosramificacoes as $r) {
            $ramificacao = RamificacaoDAO::getRamificacaoById($r->getIdRamificacao());
            array_push($todasramificacoes, $ramificacao->getNome());
        }
        foreach ($compostoscadeias as $c) {
            $cadeia = CadeiaDAO::getCadeiaById($c->getIdCadeia());
            array_push($todascadeias, $cadeia->getTipo());
        }
        require_once 'view/detalhesComposto.php';
    }

    public static function recuperar() {
        $id = $_GET["id"];
        $composto = CompostoDAO::getById($id);
        $compostoscadeias = CompostoCadeiaDAO::getByIdComposto($id);
        $compostosramificacoes = CompostoRamificacaoDAO::getByIdComposto($id);
        $todasramificacoes = array();
        $todascadeias = array();
        foreach ($compostosramificacoes as $r) {
            $ramificacao = RamificacaoDAO::getRamificacaoById($r->getIdRamificacao());
            array_push($todasramificacoes, $ramificacao->getId());
        }
        foreach ($compostoscadeias as $c) {
            $cadeia = CadeiaDAO::getCadeiaById($c->getIdCadeia());
            array_push($todascadeias, $cadeia->getId());
        }
        require_once 'view/editarComposto.php';
    }

    public static function editar() {
        UsuarioController::limitaracesso();
        $nomeImagem = $_FILES['formulaestrutural']['name'];
        $tipo = strrchr($nomeImagem, ".");
        $nomenclatura = $_POST["nomenclatura"];
        $funcaoOrganica = $_POST["funcaoorganica"];
        $formulaMolecular = $_POST["formulamolecular"];
        $id = $_GET["id"];
        $c = CompostoDAO::getById($id);

        if (isset($_POST["subgrupo"])) {
            $Subgrupo = $_POST["subgrupo"];
        } else {
            $Subgrupo = "";
        }

        if (isset($_POST["cadeia"])) {
            $cadeia = $_POST["cadeia"];
        }

        if (isset($_POST["ramificacao"])) {
            $ramificacao = $_POST["ramificacao"];
        } else if (isset($_POST["cadeia"])) {
            $indice = array_search('1', $cadeia);
            if ($indice !== false) {
                unset($cadeia[$indice]);
            }
        }

        if ($nomeImagem != "") {
            $novoNome = "view/uploads/" . time() . $tipo;
        } else {
            $novoNome = "";
        }

        if (move_uploaded_file($_FILES['formulaestrutural']['tmp_name'], $novoNome)) {
            unlink($img = $c->getFormulaEstrutural());
            $composto = new Composto($nomenclatura, $funcaoOrganica, $formulaMolecular, $novoNome, $Subgrupo, $id);
            CompostoDAO::update($composto);
        } else {
            $composto = new Composto($nomenclatura, $funcaoOrganica, $formulaMolecular, $novoNome, $Subgrupo, $id);
            CompostoDAO::update($composto);
        }

        if (isset($cadeia)) {
            CompostoCadeiaDAO::delete($id);
            foreach ($cadeia as $c) {
                $compostoCadeia = new CompostoCadeia($id, $c);
                CompostoCadeiaDAO::insert($compostoCadeia);
            }
        } else {
            CompostoCadeiaDAO::delete($id);
        }

        if (isset($ramificacao)) {
            CompostoRamificacaoDAO::delete($id);
            if (in_array(1, $cadeia)) {
                foreach ($ramificacao as $r) {
                    $compostoRamificacao = new CompostoRamificacao($id, $r);
                    CompostoRamificacaoDAO::insert($compostoRamificacao);
                }
            }
        } else {
            CompostoRamificacaoDAO::delete($id);
        }
        CompostoController::recuperar();
    }

}
