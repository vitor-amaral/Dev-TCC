<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Pedido.class.php");      
require_once("../M/dao/PedidoDAO.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");

$con = new Conexao();

$DAO = new PedidoDAO($con->getConexao());

if(isset($_REQUEST['idPedido'])){
    
    $Exc = $DAO->getPedido($_REQUEST['idPedido']);
    $retorno = $DAO->delete($Exc);
    
    if($retorno) $ret = "se";  else $ret="ee";
}


header("location:listaPedidos.php?ret=".$ret);
?>
