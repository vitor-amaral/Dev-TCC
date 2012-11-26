<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Mensagem.class.php");      
require_once("../M/dao/MensagemDAO.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");

$con = new Conexao();

$DAO = new MensagemDAO($con->getConexao());
                     
if(isset($_REQUEST['destinatario'])){
    $destinatario = $_REQUEST['destinatario'];
    $smarty->assign("destinatario",$destinatario);
}else{
    $destinatario = "";
}

if(isset($_REQUEST['tituloMensagem'])){
    $tituloMensagem = $_REQUEST['tituloMensagem'];
    $smarty->assign("tituloMensagem",$tituloMensagem);
}else{
    $tituloMensagem = "";
}

if(isset($_REQUEST['mensagem'])){
    $mensagem = $_REQUEST['mensagem'];
    $smarty->assign("mensagem",$mensagem);
}else{
    $mensagem = "";
}        

$mensagens = $DAO->getMensagensByFiltro($tituloMensagem,$mensagem);  
$clientes = $DAO->getClientes();

$totalMensagens = count($mensagens);    

$smarty->assign("ret",$_REQUEST['ret']);       
$smarty->assign("totalMensagens",$totalMensagens);
$smarty->assign("mensagens",$mensagens);
$smarty->assign("clientes",$clientes);
$smarty->display("listaMensagem.html");