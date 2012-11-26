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
$Save="";

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
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);
$smarty->assign("clientes",$clientes);
$smarty->display("cadMensagem.html");
?>
