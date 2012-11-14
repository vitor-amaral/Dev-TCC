<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");

$con = new Conexao();
$DAO = new ClienteDAO($con->getConexao());  

$clientes = $DAO->getClientes();

$smarty->assign("ret",$_REQUEST['ret']);  
$smarty->assign("clientes",$clientes);       
$smarty->display("listaFrequencia.html");