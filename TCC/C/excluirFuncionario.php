<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Funcionario.class.php");      
require_once("../M/dao/FuncionarioDAO.class.php");

$con = new Conexao();

$DAO = new FuncionarioDAO($con->getConexao());

if(isset($_REQUEST['idFuncionario'])){
    
    $Exc = $DAO->getFuncionario($_REQUEST['idFuncionario']);
    $DAO->delete($Exc);
}


header("location:listaFuncionarios.php");
?>
