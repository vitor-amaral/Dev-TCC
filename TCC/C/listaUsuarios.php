<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Usuario.class.php"); 
require_once("../M/dao/UsuarioDAO.class.php"); 
require_once("../M/classes/Funcionario.class.php");      
require_once("../M/dao/FuncionarioDAO.class.php");
require_once("../M/classes/TipoAcesso.class.php"); 
require_once("../M/dao/TipoAcessoDAO.class.php"); 

$con = new Conexao();

$DAO = new UsuarioDAO($con->getConexao());  
$funcionarioDAO = new FuncionarioDAO($con->getConexao());
$tipoacessoDAO = new TipoAcessoDAO($con->getConexao()); 

if(isset($_REQUEST['loginUsuario'])){
    $login = $_REQUEST['loginUsuario'];
    $smarty->assign("loginUsuario",$login);
}else{
    $login = "";
}

if(isset($_REQUEST['idTipoAcesso'])){
    $tipo = $_REQUEST['idTipoAcesso'];
    $smarty->assign("idTipoAcesso",$tipo);
}else{
    $tipo = "";
}

if(isset($_REQUEST['idFuncionario'])){
    $funcionario = $_REQUEST['idFuncionario'];
    $smarty->assign("idFuncionario",$funcionario);
}else{
    $funcionario = "";
}

$usuarios = $DAO->getUsuarios_Filtro($login,$tipo,$funcionario);

$total = count($usuarios);
$tipos = $tipoacessoDAO->getTipoAcesso_all();
$funcionarios = $funcionarioDAO->getFuncionarios(); 

$smarty->assign("totalUsuarios",$total);
$smarty->assign("usuarios",$usuarios); 
$smarty->assign("funcionarios",$funcionarios);
$smarty->assign("tipos",$tipos); 
$smarty->display("listaUsuario.html");