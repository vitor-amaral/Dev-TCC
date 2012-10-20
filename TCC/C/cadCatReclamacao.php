<?php
    
require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/CategoriaReclamacao.class.php");      
require_once("../M/dao/CategoriaReclamacaoDAO.class.php");

$con = new Conexao();

$DAO = new CategoriaReclamacaoDAO($con->getConexao());

if(isset($_REQUEST['idCatReclamacao'])){
    $idCatReclamacao = $_REQUEST['idCatReclamacao'];
}else{
    $idCatReclamacao = "";
}

$msg ="";
$Save="";

if($idCatReclamacao != ""){
    $catReclamacao = $DAO->getCatReclamacao($idCatReclamacao);
    $msg="Alterar";
    $nomeBotao = "Salvar";
    $Save="a";
   
}else{   
    $catReclamacao = new CategoriaReclamacao();     
    $msg = "Cadastro";
    $nomeBotao = "Salvar";
    $Save = "s";  
}

$smarty->assign("catReclamacao",$catReclamacao);   
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);

$smarty->display("cadCatReclamacao.html");
?>
