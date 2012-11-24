<?php                
require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Pedido.class.php");      
require_once("../M/dao/PedidoDAO.class.php");
require_once("../M/classes/Produto.class.php");      
require_once("../M/dao/ProdutoDAO.class.php");
require_once("../M/classes/ProdutoPedido.class.php");      
require_once("../M/dao/ProdutoPedidoDAO.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");

$con = new Conexao();

$DAO = new PedidoDAO($con->getConexao());
$ProdutoPedidoDAO = new ProdutoPedidoDAO($con->getConexao());   
                                 
$Save = $_REQUEST['Save'];     

$pedido = new Pedido();
$pedido->setPro_Qtde($_REQUEST['qtdeProduto']);
$pedido->setPed_Data($_REQUEST['dataPedido']);
$pedido->setPed_Coment($_REQUEST['comentPedido']);
$pedido->setCli_ID($_REQUEST['autorPedido']);
$pedido->setPed_ID($_REQUEST['idPedido']);


if($_REQUEST['nomeAlimento'] != null){
    $pedido->setPro_ID($_REQUEST['nomeAlimento']);
}
if($_REQUEST['nomeBebida'] != null){
    $pedido->setPro_ID($_REQUEST['nomeBebida']);
}
if($_REQUEST['nomeOutros'] != null){
    $pedido->setPro_ID($_REQUEST['nomeOutros']);
}
                       

if(!isset($msg))
                 
if($Save == "s"){       
    $msg="Cadastro";
    $retorno = $DAO->inserir($pedido);
    $produtoPedido = new ProdutoPedido();
    $produtoPedido->setPro_ID($pedido->getPro_ID());
    $produtoPedido->setPed_ID($retorno);
    $produtoPedido->setProped_Comentario($pedido->getPed_Coment());    
    $produtoPedido->setProped_Qtde($_REQUEST['qtdeProduto']);        
    echo $produtoPedido->getProped_Comentario();    
    $retorno2 = $ProdutoPedidoDAO->inserir($produtoPedido);
    
    $nomeBotao = "Salvar";
    $Alterado = new Pedido();      
    
    if($retorno) $ret = "sc";  else $ret="ec";
    
    if($ret == "sc"){
        if($retorno2) $ret = "sc";  else $ret="ec";
    } 
}

if($Save == "a"){
    $msg="Alterar";    
    $retorno = $DAO->alterar($pedido);
                                                
    $produtoPedido = new ProdutoPedido();
    $produtoPedido->setPro_ID($pedido->getPro_ID());    
    $produtoPedido->setPed_ID($pedido->getPed_ID());
    $produtoPedido->setProped_Comentario($_REQUEST['comentPedido']);      
    $produtoPedido->setProped_Qtde($_REQUEST['qtdeProduto']);
    
    $retorno2 = $ProdutoPedidoDAO->alterar($produtoPedido);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getPedido($pedido->getPed_ID());
    
    if($retorno) $ret = "sa";  else $ret="ea";
    if($ret == "sa"){
        if($retorno2) $ret = "sa";  else $ret="ea";
    } 
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
                          
$alimentos = $DAO->getProdutoByTipo(1);
$bebidas = $DAO->getProdutoByTipo(2);
$outros = $DAO->getProdutoByTipo(3);
$clientes = $DAO->getClientes();
                 
$smarty->assign("alimentos",$alimentos);
$smarty->assign("bebidas",$bebidas);
$smarty->assign("outros",$outros);
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("clientes",$clientes);
$smarty->assign("pedido",$Alterado);
$smarty->assign("Save",$Save);
$smarty->assign("msg",$msg);
$smarty->assign("ret",$ret);
$smarty->display("cadPedido.html");
//header("refresh: 1; url=cadReclamacao.php"); 

?>
