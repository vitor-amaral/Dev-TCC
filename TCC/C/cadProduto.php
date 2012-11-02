<?php
  
require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Produto.class.php");
require_once("../M/dao/ProdutoDAO.class.php");

$con = new Conexao();
$DAO = new ProdutoDAO($con->getConexao());


if(isset($_REQUEST['idProduto'])){
    $idProduto = $_REQUEST['idProduto'];
}else{
    $idProduto = "";
}

$msg = '';
$Save = '';

if($idProduto != ""){
    $produto = $DAO->getProduto($idProduto);
    $msg="Alterar";
    $nomeBotao = "Salvar";
    $Save="a";

}else{       
    $produto = new Produto();     
    $msg = "Cadastro";
    $nomeBotao = "Salvar";
    $Save = "s";  
}

$smarty->assign("produto",$produto);   
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);
$smarty->display("cadProduto.html");
?>
