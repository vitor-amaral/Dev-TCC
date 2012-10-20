<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Reclamacao.class.php");      
require_once("../M/dao/ReclamacaoDAO.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");
require_once("../M/classes/CategoriaReclamacao.class.php");      
require_once("../M/dao/CategoriaReclamacaoDAO.class.php");

$con = new Conexao();

$DAO = new ReclamacaoDAO($con->getConexao());

if(isset($_REQUEST['idReclamacao'])){
    
    $Exc = $DAO->getReclamacao($_REQUEST['idReclamacao']);
    $retorno = $DAO->delete($Exc);
    
    if($retorno) $ret = "se";  else $ret="ee";
}


header("location:listaReclamacoes.php?ret=".$ret);
?>
