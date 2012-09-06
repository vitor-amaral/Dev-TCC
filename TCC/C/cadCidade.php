<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Cidade.class.php");      
require_once("../M/dao/CidadeDAO.class.php");

$con = new Conexao();

$DAO = new CidadeDAO($con->getConexao());

if(isset($_REQUEST['idCidade'])){
    $idCidade = $_REQUEST['idCidade'];
}else{
    $idCidade = "";
}

$msg ="";
$Save="";

if($idCidade != ""){
    $cidade = $DAO->getCidade($idCidade);
    $msg="Alterar";
    $nomeBotao = "Salvar";
    $Save="a";
   
}else{   
    $cidade = new Cidade();     
    $msg = "Cadastro";
    $nomeBotao = "Salvar";
    $Save = "s";  
}

$smarty->assign("cidade",$cidade);   
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);

$smarty->display("cadCidade.html");
?>
