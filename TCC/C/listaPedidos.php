<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Pedido.class.php");      
require_once("../M/dao/PedidoDAO.class.php");
require_once("../M/classes/Produto.class.php");      
require_once("../M/dao/ProdutoDAO.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");

$con = new Conexao();
$DAO = new PedidoDAO($con->getConexao());
         
$idProduto = "";         

if(isset($_REQUEST['autorPedido'])){
    $autorPedido = $_REQUEST['autorPedido'];    
    $smarty->assign("autorPedido",$autorPedido);
}else{
    $autorPedido = "";
}    

if(isset($_REQUEST['nomeAlimento'])){
    $nomeAlimento = $_REQUEST['nomeAlimento'];
    $smarty->assign("nomeAlimento",$nomeAlimento);
    if($nomeAlimento != null){
        $idProduto = $_REQUEST['nomeAlimento'];  
    }
}else{
    $nomeAlimento = "";
}

if(isset($_REQUEST['nomeBebida'])){
    $nomeBebida = $_REQUEST['nomeBebida'];       
    $smarty->assign("nomeBebida",$nomeBebida);
    if($nomeBebida != null){
        $idProduto = $_REQUEST['nomeBebida'];     
    }
}else{
    $nomeBebida = "";
}

if(isset($_REQUEST['nomeOutros'])){
    $nomeOutros = $_REQUEST['nomeOutros'];
    $smarty->assign("nomeOutros",$nomeOutros);
    if($nomeOutros != null){
        $idProduto = $_REQUEST['nomeOutros'];   
    }
}else{
    $nomeOutros = "";
}

if(isset($_REQUEST['qtdeProduto'])){
    $qtdeProduto = $_REQUEST['qtdeProduto'];
    $smarty->assign("qtdeProduto",$qtdeProduto);
}else{
    $qtdeProduto = "";
}

if(isset($_REQUEST['dataPedido'])){
    $dataPedido = $_REQUEST['dataPedido'];
    $smarty->assign("dataPedido",$dataPedido);
}else{
    $dataPedido = "";
}

if(isset($_REQUEST['comentPedido'])){
    $comentPedido = $_REQUEST['comentPedido'];
    $smarty->assign("comentPedido",$comentPedido);
}else{                                            
    $comentPedido = "";
}
       
$pedidos = $DAO->getPedidoByFiltro($autorPedido,$idProduto,$qtdeProduto,$dataPedido,$comentPedido);      
$alimentos = $DAO->getProdutoByTipo(1);
$bebidas = $DAO->getProdutoByTipo(2);
$outros = $DAO->getProdutoByTipo(3);
$clientes = $DAO->getClientes();

$totalPedidos = count($pedidos);    

$smarty->assign("ret",$_REQUEST['ret']);       
$smarty->assign("totalPedidos",$totalPedidos);
$smarty->assign("pedidos",$pedidos);
$smarty->assign("alimentos",$alimentos);
$smarty->assign("bebidas",$bebidas);
$smarty->assign("outros",$outros);
$smarty->assign("clientes",$clientes);
$smarty->display("listaPedido.html");