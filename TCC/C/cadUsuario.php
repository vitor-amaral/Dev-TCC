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

if(isset($_REQUEST['idUsuario'])){
    $idUsuario = $_REQUEST['idUsuario'];
}else{
    $idUsuario = "";
}

$msg ="";
$Save="";
                     

if($idUsuario != ""){
    $usuario = $DAO->getUsuario($idUsuario);
    $msg="Alterar";
    $nomeBotao = "Salvar";
    $Save="a";
   
}else{   
    $usuario = new Usuario();     
    $msg = "Cadastro";
    $nomeBotao = "Salvar";
    $Save = "s";  
}
  
$tipos = $tipoacessoDAO->getTipoAcesso_all();
$funcionarios = $funcionarioDAO->getFuncionarios();

$smarty->assign("tipos",$tipos);  
$smarty->assign("funcionarios",$funcionarios);  
$smarty->assign("usuario",$usuario);   
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);

$smarty->display("cadUsuario.html");
?>
