<?php

require_once("SmartyConf.php");                  
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Produto.class.php");
require_once("../M/dao/ProdutoDAO.class.php");
           
$con = new Conexao();
$DAO = new ProdutoDAO($con->getConexao());
$Save = $_REQUEST['Save'];

$produto = new Produto();
$produto ->setPro_Nome($_REQUEST['nomeProduto']);
$produto ->setPro_Tipo($_REQUEST['tipoProduto']);
$produto ->setPro_Preco($_REQUEST['precoProduto']);              

if(!isset($msg))

if($Save == "s"){ 

    $msg="Cadastro";
    $retorno = $DAO->inserir($produto);
    $nomeBotao = "Salvar";
    $Alterado = new Produto();      
    
    if($retorno) $ret = "sc";  else $ret="ec";     

}

if($Save == "a"){
    $msg="Alterar";
    $produto->setPro_ID($_REQUEST['idProduto']);    
    $retorno = $DAO->alterar($produto);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getProduto($produto->getPro_ID());
    
    if($retorno) $ret = "sa";  else $ret="ea";
}


$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("produto",$Alterado);
$smarty->assign("msg",$msg);
$smarty->assign("ret",$ret);       
$smarty->display("cadProduto.html");
?>
