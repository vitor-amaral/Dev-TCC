<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");
require_once("../M/classes/Usuario.class.php");      
require_once("../M/dao/UsuarioDAO.class.php"); 

$con = new Conexao();
                                          
$DAO = new ClienteDAO($con->getConexao());
$usuarioDAO = new UsuarioDAO($con->getConexao()); 


if(isset($_REQUEST['nomeCliente'])){
    $nome = $_REQUEST['nomeCliente'];
    $smarty->assign("nomeCliente",$nome);
}else{
    $nome = "";
}

if(isset($_REQUEST['referenciaCliente'])){
    $referencia = $_REQUEST['referenciaCliente'];
    $smarty->assign("referenciaCliente",$referencia);
}else{
    $matricula = "";
}

if(isset($_REQUEST['idusuario'])){
    $usuario = $_REQUEST['idusuario'];
    $smarty->assign("idusuario",$usuario);
}else{
   $usuario = "";
}
      

$clientes = $DAO->getClientes_Filtro($nome,$referencia,'', '',$usuario,'','','');

$total = count($clientes);
$usuarios = $usuarioDAO->getUsuarios(); 
  
       
$smarty->assign("totalClientes",$total);
$smarty->assign("clientes",$clientes);
//$smarty->assign("usuarios",$usuarios); 
$smarty->display("listaCliente.html");