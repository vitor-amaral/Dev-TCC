<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Mensagem.class.php");      
require_once("../M/dao/MensagemDAO.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");
;

$con = new Conexao();

$DAO = new MensagemDAO($con->getConexao());

$Save = $_REQUEST['Save'];     

$mensagem = new Mensagem();
$mensagem->setMens_ID($_REQUEST['idMensagem']);
$mensagem->setMens_Texto($_REQUEST['mensagem']);
$mensagem->setMens_Titulo($_REQUEST['tituloMensagem']);
$mensagem->setUsu_ID(1);

if(!isset($msg))

if($Save == "s"){
    $msg="Cadastro";
    $retorno = $DAO->inserir($mensagem);
    
    $nomeBotao = "Salvar";
    $Alterado = new Mensagem();      
    
    if($retorno) $ret = "sc";  else $ret="ec"; 
}

if($Save == "a"){
    $msg="Alterar";    
    $retorno = $DAO->alterar($mensagem);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getMensagem($mensagem->getMens_ID());
    
    if($retorno) $ret = "sa";  else $ret="ea";
}

if($idMensagem != ""){
    $mensagem = $DAO->getMensagem($idMensagem);
    $msg="Alterar";
    $nomeBotao = "Salvar";
    $Save="a";
   
}else{   
    $mensagem = new Mensagem();     
    $msg = "Cadastro";
    $nomeBotao = "Salvar";
    $Save = "s";  
}

$clientes = $DAO->getClientes();

$smarty->assign("mensagem",$mensagem);
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("clientes",$clientes);
$smarty->assign("Save",$Save);
$smarty->assign("msg",$msg);
$smarty->assign("ret",$ret);
$smarty->display("cadMensagem.html");
//header("location:cadReclamacao.php");
//header("refresh: 1; url=cadReclamacao.php"); 

?>
