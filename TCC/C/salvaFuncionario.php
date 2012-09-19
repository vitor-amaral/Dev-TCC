<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Funcionario.class.php");      
require_once("../M/dao/FuncionarioDAO.class.php");

$con = new Conexao();

$DAO = new FuncionarioDAO($con->getConexao());

$Save = $_REQUEST['Save'];     

$funcionario = new Funcionario();
$funcionario->setFuncionario_Nome($_REQUEST['nomeFuncionario']);
$funcionario->setFuncionario_Matricula($_REQUEST['matriculaFuncionario']);
$funcionario->setCargo_ID($_REQUEST['idcargo']);


if(!isset($msg))

if($Save == "s"){
    $msg="Cadastro";
    $retorno = $DAO->inserir($funcionario);
    
    $nomeBotao = "Salvar";
    $Alterado = new Funcionario();      
    
    if($retorno) $ret = "sc";  else $ret="ec"; 
}

if($Save == "a"){
    $msg="Alterar";
    $funcionario->setFuncionario_ID($_REQUEST['idFuncionario']);
    $retorno = $DAO->alterar($funcionario);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getFuncionario($funcionario->getFuncionario_ID());
    
    if($retorno) $ret = "sa";  else $ret="ea";
}


$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("funcionario",$Alterado);
$smarty->assign("msg",$msg);
$smarty->assign("ret",$ret);
$smarty->display("cadFuncionario.html");
?>
