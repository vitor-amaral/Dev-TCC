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

if(isset($_REQUEST['idReclamacao'])){
    $idReclamacao = $_REQUEST['idReclamacao'];    
}else{
    $idReclamacao = "";
}

$msg ="";
$Save="";

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
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);
$smarty->assign("clientes",$clientes);
$smarty->assign("categorias",$categorias);
$smarty->display("cadReclamacao.html");
?>
