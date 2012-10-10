<?php
  
require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Evento.class.php");
require_once("../M/dao/EventoDAO.class.php");

$con = new Conexao();
$DAO = new EventoDAO($con->getConexao());


if(isset($_REQUEST['idEvento'])){
    $idEvento = $_REQUEST['idEvento'];
}else{
    $idEvento = "";
}

$msg = '';
$Save = '';

if($idEvento != ""){
    $evento = $DAO->getEvento($idEvento);
    $msg="Alterar";
    $nomeBotao = "Salvar";
    $Save="a";

}else{       
    $evento = new Evento();     
    $msg = "Cadastro";
    $nomeBotao = "Salvar";
    $Save = "s";  
}

$smarty->assign("evento",$evento);   
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);
$smarty->display("cadEvento.html");
?>
