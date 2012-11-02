<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Produto.class.php");      
require_once("../M/dao/ProdutoDAO.class.php");

$con = new Conexao();

$DAO = new ProdutoDAO($con->getConexao());

if(isset($_REQUEST['idProduto'])){
    
    $Exc = $DAO->getProduto($_REQUEST['idProduto']);
    $retorno = $DAO->delete($Exc);
    
    if($retorno) $ret = "se";  else $ret="ee";
}


header("location:listaProdutos.php?ret=".$ret);
?>
