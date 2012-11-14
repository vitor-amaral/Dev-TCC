<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Produto.class.php");      
require_once("../M/dao/ProdutoDAO.class.php");

$con = new Conexao();

$DAO = new ProdutoDAO($con->getConexao());                     


if(isset($_REQUEST['alimento'])){
    $alimento = $_REQUEST['alimento'];
    $smarty->assign("alimento",$alimento);
}else{
    $alimento = "";
}


$alimentos = $DAO->getProdutoByTipo(0);//tipo = alimento  

$smarty->assign("alimentos",$alimentos);
$smarty->display("consumoAlimento.html");