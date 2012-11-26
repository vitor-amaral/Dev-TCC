<?php
    
require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Mensagem.class.php");      
require_once("../M/dao/MensagemDAO.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");

$con = new Conexao();

$DAO = new MensagemDAO($con->getConexao());

if(isset($_REQUEST['idMensagem'])){
    $idMensagem = $_REQUEST['idMensagem'];    
}else{
    $idMensagem = "";
}

$msg ="";


if($idMensagem != ""){
    $mensagem = $DAO->getMensagem($idMensagem);
    $msg="Alterar";
    $nomeBotao = "Enviar";  
}

$clientes = $DAO->getClientesEmail();                   

$smarty->assign("mensagem",$mensagem);   
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("clientes",$clientes);
$smarty->display("selecionaMensagem.html");
?>
