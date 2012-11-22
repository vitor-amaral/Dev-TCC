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

$Save = $_REQUEST['Save'];     

$pedido = new Pedido();
$pedido->setPed_ID($_REQUEST['autorPedido']);
$pedido->setPro_Qtde($_REQUEST['qtdeProduto']);
$pedido->setPed_Data($_REQUEST['dataPedido']);
$pedido->setPed_Coment($_REQUEST['comentPedido']);

$alimento->setReclamacao_desc($_REQUEST['nomeAlimento']);
$bebida->setReclamacao_titulo($_REQUEST['nomeBebida']);
$outro->setReclamacao_status($_REQUEST['nomeOutros']);

if($alimento != null){
    $pedido->setPro_ID($alimento);
}
if($bebida != null){
    $pedido->setPro_ID($bebida);
}
if($outro != null){
    $pedido->setPro_ID($outro);
}

if(!isset($msg))

if($Save == "s"){
    $msg="Cadastro";
    $retorno = $DAO->inserir($pedido);
    
    $nomeBotao = "Salvar";
    $Alterado = new Reclamacao();      
    
    if($retorno) $ret = "sc";  else $ret="ec"; 
}

if($Save == "a"){
    $msg="Alterar";    
    $retorno = $DAO->alterar($pedido);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getPedido($pedido->getPed_ID());
    
    if($retorno) $ret = "sa";  else $ret="ea";
}

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

$categorias = $DAO->getCatReclamacoes();
$clientes = $DAO->getClientes();

$smarty->assign("reclamacao",$reclamacao);
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("clientes",$clientes);
$smarty->assign("categorias",$categorias);
$smarty->assign("Save",$Save);
$smarty->assign("msg",$msg);
$smarty->assign("ret",$ret);
$smarty->display("cadReclamacao.html");
//header("location:cadReclamacao.php");
header("refresh: 1; url=cadReclamacao.php"); 

?>
