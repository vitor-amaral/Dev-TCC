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

$Save = $_REQUEST['Save'];     

$reclamacao = new Reclamacao();
$reclamacao->setReclamacao_id($_REQUEST['idReclamacao']);
$reclamacao->setReclamacao_desc($_REQUEST['descReclamacao']);
$reclamacao->setReclamacao_titulo($_REQUEST['tituloReclamacao']);
$reclamacao->setReclamacao_status($_REQUEST['statusReclamacao']);
$reclamacao->setCategoria_id($_REQUEST['catReclamacao']);
$reclamacao->setCliente_id($_REQUEST['autorReclamacao']);


if(!isset($msg))

if($Save == "s"){
    $msg="Cadastro";
    $retorno = $DAO->inserir($reclamacao);
    
    $nomeBotao = "Salvar";
    $Alterado = new Reclamacao();      
    
    if($retorno) $ret = "sc";  else $ret="ec"; 
}

if($Save == "a"){
    $msg="Alterar";    
    $retorno = $DAO->alterar($reclamacao);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getReclamacao($reclamacao->getReclamacao_ID());
    
    if($retorno) $ret = "sa";  else $ret="ea";
}

if($idReclamacao != ""){
    $reclamacao = $DAO->getReclamacao($idReclamacao);
    $msg="Alterar";
    $nomeBotao = "Salvar";
    $Save="a";
   
}else{   
    $reclamacao = new Reclamacao();     
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
