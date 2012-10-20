<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Reclamacao.class.php");      
require_once("../M/dao/ReclamacaoDAO.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");
require_once("../M/classes/CategoriaReclamacao.class.php");      
require_once("../M/dao/CategoriaReclamacaoDAO.class.php");

$con = new Conexao();

$DAO = new ReclamacaoDAO($con->getConexao());
                     
if(isset($_REQUEST['descReclamacao'])){
    $reclamacaoDesc = $_REQUEST['descReclamacao'];
    $smarty->assign("descReclamacao",$reclamacaoDesc);
}else{
    $reclamacaoDesc = "";
}

if(isset($_REQUEST['tituloReclamacao'])){
    $reclamacaoTitulo = $_REQUEST['tituloReclamacao'];
    $smarty->assign("tituloReclamacao",$reclamacaoTitulo);
}else{
    $reclamacaoTitulo = "";
}

if(isset($_REQUEST['statusReclamacao'])){
    $reclamacaoStatus = $_REQUEST['statusReclamacao'];
    $smarty->assign("statusReclamacao",$reclamacaoStatus);
}else{
    $reclamacaoStatus = "";
}

if(isset($_REQUEST['autorReclamacao'])){
    $clienteID = $_REQUEST['autorReclamacao'];
    $smarty->assign("autorReclamacao",$clienteID);
}else{
    $clienteID = "";
}

if(isset($_REQUEST['catReclamacao'])){
    $categoriaID = $_REQUEST['catReclamacao'];
    $smarty->assign("catReclamacao",$categoriaID);
}else{
    $categoriaID = "";
}


$reclamacoes = $DAO->getReclamacoesByFiltro($reclamacaoDesc,$reclamacaoTitulo,$reclamacaoStatus,$clienteID,$categoriaID);  
$categorias = $DAO->getCatReclamacoes();
$clientes = $DAO->getClientes();

$totalReclamacoes = count($reclamacoes);    

$smarty->assign("ret",$_REQUEST['ret']);       
$smarty->assign("totalReclamacoes",$totalReclamacoes);
$smarty->assign("reclamacoes",$reclamacoes);
$smarty->assign("categorias",$categorias);
$smarty->assign("clientes",$clientes);
$smarty->display("listaReclamacao.html");