<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/CategoriaReclamacao.class.php");      
require_once("../M/dao/CategoriaReclamacaoDAO.class.php");

$con = new Conexao();

$DAO = new CategoriaReclamacaoDAO($con->getConexao());

$Save = $_REQUEST['Save'];     

$catReclamacao = new CategoriaReclamacao();
$catReclamacao->setCatReclamacao_Desc($_REQUEST['catReclamacao']);

if(!isset($msg))

if($Save == "s"){
    $msg="Cadastro";
    $retorno = $DAO->inserir($catReclamacao);
    
    $nomeBotao = "Salvar";
    $Alterado = new CategoriaReclamacao();      
    
    if($retorno) $ret = "sc";  else $ret="ec"; 
}

if($Save == "a"){
    $msg="Alterar";
    $catReclamacao->setCatReclamacao_ID($_REQUEST['idCatReclamacao']);
    $retorno = $DAO->alterar($catReclamacao);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getCatReclamacao($catReclamacao->getCatReclamacao_ID());
    
    if($retorno) $ret = "sa";  else $ret="ea";
}


$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("catReclamacao",$Alterado);
$smarty->assign("msg",$msg);
$smarty->assign("ret",$ret);
$smarty->display("cadCatReclamacao.html");
header("refresh: 1; url=cadCatReclamacao.php");
?>
