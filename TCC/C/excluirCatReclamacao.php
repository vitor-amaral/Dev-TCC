<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/CategoriaReclamacao.class.php");      
require_once("../M/dao/CategoriaReclamacaoDAO.class.php");

$con = new Conexao();

$DAO = new CategoriaReclamacaoDAO($con->getConexao());

if(isset($_REQUEST['idCatReclamacao'])){
    
    $Exc = $DAO->getCatReclamacao($_REQUEST['idCatReclamacao']);
    $retorno = $DAO->delete($Exc);
    
    if($retorno) $ret = "se";  else $ret="ee";
}


header("location:listaCatReclamacao.php?ret=".$ret);
?>
