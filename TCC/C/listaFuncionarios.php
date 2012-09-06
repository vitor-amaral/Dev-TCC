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

if(isset($_REQUEST['nomeFuncionario'])){
    $nome = $_REQUEST['nomeFuncionario'];
    $smarty->assign("nomeFuncionario",$nome);
}else{
    $nome = "";
}

if(isset($_REQUEST['matriculaFuncionario'])){
    $matricula = $_REQUEST['matriculaFuncionario'];
    $smarty->assign("matriculaFuncionario",$matricula);
}else{
    $matricula = "";
}

if(isset($_REQUEST['idcargo'])){
    $cargo = $_REQUEST['idcargo'];
    $smarty->assign("idcargo",$cargo);
}else{
    $cargo = "";
}

$funcionarios = $DAO->getFuncionarios_Filtro($nome,$matricula,$cargo);

$total = count($funcionarios);
$cargos = $cargoDAO->getCargos(); 
    
       
$smarty->assign("totalFuncionarios",$total);
$smarty->assign("funcionarios",$funcionarios);
$smarty->assign("cargos",$cargos); 
$smarty->display("listaFuncionario.html");