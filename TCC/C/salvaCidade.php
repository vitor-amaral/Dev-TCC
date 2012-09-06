<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Cidade.class.php");      
require_once("../M/dao/CidadeDAO.class.php");

$con = new Conexao();

$DAO = new CidadeDAO($con->getConexao());

$Save = $_REQUEST['Save'];     

$cidade = new Cidade();
$cidade->setCidade_Nome($_REQUEST['nomeCidade']);

if(!isset($msg))

if($Save == "s"){
    $msg="Cadastro";
    $retorno = $DAO->inserir($cidade);
    
    $nomeBotao = "Salvar";
    $Alterado = new Cidade();      
    
    if($retorno)
     $ret = "s";
}

if($Save == "a"){
    $msg="Alterar";
    $cidade->setCidade_ID($_REQUEST['idCidade']);
    $retorno = $DAO->alterar($cidade);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getCidade($cidade->getCidade_ID());
    
    if($retorno)
     $ret = "sa";
}


$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("cidade",$Alterado);
$smarty->assign("msg",$msg);
$smarty->assign("ret",$ret);
$smarty->display("cadCidade.html");
?>
