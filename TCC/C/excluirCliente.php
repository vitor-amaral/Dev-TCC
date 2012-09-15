<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");

$con = new Conexao();

$DAO = new ClienteDAO($con->getConexao());

if(isset($_REQUEST['idCliente'])){
    
    $Exc = $DAO->getCliente($_REQUEST['idCliente']);
    $retorno = $DAO->delete($Exc);
    
    if($retorno) $ret = "se";  else $ret="ee";
}


header("location:listaClientes.php?ret=".$ret);
?>
