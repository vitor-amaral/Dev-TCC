<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Produto.class.php");
require_once("../M/dao/ProdutoDAO.class.php");


$con = new Conexao();
$DAO = new ProdutoDAO($con->getConexao());

if(isset($_REQUEST['nomeProduto'])){
    $nomeProduto = $_REQUEST['nomeProduto'];
    $smarty->assign("nomeProduto",$nomeProduto);
}else{
    $nomeProduto = "";
}

if(isset($_REQUEST['precoProduto'])){
    $precoProduto = $_REQUEST['precoProduto'];
    $smarty->assign("precoProduto",$precoProduto);
}else{
    $precoProduto = "";
}

if(isset($_REQUEST['tipoProduto'])){
    $tipoProduto = $_REQUEST['tipoProduto'];
    $smarty->assign("tipoProduto",$tipoProduto);
}else{
    $tipoProduto = "";
}

$produtos = $DAO->getProdutoByFiltro($nomeProduto,$precoProduto,$tipoProduto); 
$total = count($produtos);

$smarty->assign("produtos",$produtos);
$smarty->assign("totalProdutos",$total);                                                                                               
$smarty->display("listaProduto.html");
?>
