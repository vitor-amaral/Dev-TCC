<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Funcionario.class.php");      
require_once("../M/dao/FuncionarioDAO.class.php");
require_once("../M/classes/Cargo.class.php"); 
require_once("../M/dao/CargoDAO.class.php"); 

$con = new Conexao();

$DAO = new FuncionarioDAO($con->getConexao());
$cargoDAO = new CargoDAO($con->getConexao());

if(isset($_REQUEST['idFuncionario'])){
    $idFuncionario = $_REQUEST['idFuncionario'];
}else{
    $idFuncionario = "";
}

$msg ="";
$Save="";
                     

if($idFuncionario != ""){
    $funcionario = $DAO->getFuncionario($idFuncionario);
    $msg="Alterar";
    $nomeBotao = "Salvar";
    $Save="a";
   
}else{   
    $funcionario = new Funcionario();     
    $msg = "Cadastro";
    $nomeBotao = "Salvar";
    $Save = "s";  
}
  
$cargos = $cargoDAO->getCargos();

$smarty->assign("cargos",$cargos);  
$smarty->assign("funcionario",$funcionario);   
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);

$smarty->display("cadFuncionario.html");
?>
