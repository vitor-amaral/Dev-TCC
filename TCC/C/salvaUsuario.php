<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Usuario.class.php");      
require_once("../M/dao/UsuarioDAO.class.php");

$con = new Conexao();

$DAO = new UsuarioDAO($con->getConexao());

$Save = $_REQUEST['Save'];     

$usuario = new Usuario();
$usuario->setUsuario_Login($_REQUEST['loginUsuario']);
$usuario->setUsuario_Senha($_REQUEST['novasenhaUsuario']);    
$usuario->setTipoAcesso_ID($_REQUEST['idTipoAcesso']);            
$usuario->setFuncionario_ID($_REQUEST['idFuncionario']);

if(!isset($msg))

if($Save == "s"){
    $msg="Cadastro";
    $retorno = $DAO->inserir($usuario);
    
    $nomeBotao = "Salvar";
    $Alterado = new Usuario();      
    
    if($retorno)
     $ret = "s";
}

if($Save == "a"){
    $msg="Alterar";
    $usuario->setUsuario_ID($_REQUEST['idUsuario']);
    $retorno = $DAO->alterar($usuario);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getUsuario($usuario->getUsuario_ID());
    
    if($retorno)
     $ret = "sa";
}


$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("usuario",$Alterado);
$smarty->assign("msg",$msg);
$smarty->assign("ret",$ret);
$smarty->display("cadUsuario.html");
?>
