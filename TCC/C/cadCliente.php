<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php"); 
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");
require_once("../M/classes/Funcionario.class.php"); 
require_once("../M/dao/FuncionarioDAO.class.php"); 

$con = new Conexao();

$DAO = new ClienteDAO($con->getConexao());

if(isset($_REQUEST['idCliente'])){
    $idCliente = $_REQUEST['idCliente'];
}else{
    $idCliente = "";
}

$msg ="";
$Save="";
                     

if($idCliente != ""){
    $cliente = $DAO->getCliente($idCliente);
    $msg="Alterar";
    $nomeBotao = "Salvar";
    $Save="a";
   
}else{   
    $cliente = new Cliente();     
    $msg = "Cadastro";
    $nomeBotao = "Salvar";
    $Save = "s";  
}


$indicadores = $DAO->getClientes_MenosFiltro($idCliente); 

$smarty->assign("cliente",$cliente); 
$smarty->assign("indicadores",$indicadores);  
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);   
$smarty->display("cadCliente.html");
?>
