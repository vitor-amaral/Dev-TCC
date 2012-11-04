<?php
  
require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Ambiente.class.php");
require_once("../M/dao/AmbienteDAO.class.php");

$con = new Conexao();
$DAO = new AmbienteDAO($con->getConexao());


if(isset($_REQUEST['idAmbiente'])){
    $idAmbiente = $_REQUEST['idAmbiente'];
}else{
    $idAmbiente = "";
}

$msg = '';
$Save = '';

if($idAmbiente != ""){
    $ambiente = $DAO->getAmbiente($idAmbiente);
    $msg="Alterar";
    $nomeBotao = "Salvar";
    $Save="a";

}else{       
    $ambiente = new Ambiente();     
    $msg = "Cadastro";
    $nomeBotao = "Salvar";
    $Save = "s";  
}

$smarty->assign("ambiente",$ambiente);   
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);
$smarty->display("cadAmbiente.html");
?>
