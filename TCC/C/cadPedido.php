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

if(isset($_REQUEST['idPedido'])){
    $idPedido = $_REQUEST['idPedido'];    
}else{
    $idPedido = "";
}

$msg ="";
$Save="";

if($idPedido != ""){
    $pedido = $DAO->getPedido($idPedido);
    $msg="Alterar";
    $nomeBotao = "Salvar";
    $Save="a";
   
}else{   
    $pedido = new Pedido();     
    $msg = "Cadastro";
    $nomeBotao = "Salvar";
    $Save = "s";  
}

$alimentos = $DAO->getProdutoByTipo(1);
$bebidas = $DAO->getProdutoByTipo(2);
$outros = $DAO->getProdutoByTipo(3);
$clientes = $DAO->getClientes();

$smarty->assign("pedido",$pedido);   
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);
$smarty->assign("alimentos",$alimentos);
$smarty->assign("bebidas",$bebidas);
$smarty->assign("outros",$outros);
$smarty->assign("clientes",$clientes);
$smarty->display("cadPedido.html");
?>
