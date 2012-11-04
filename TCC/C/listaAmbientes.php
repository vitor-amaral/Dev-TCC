<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Ambiente.class.php");
require_once("../M/dao/AmbienteDAO.class.php");


$con = new Conexao();
$DAO = new AmbienteDAO($con->getConexao());

if(isset($_REQUEST['nomeAmbiente'])){
    $nomeAmbiente = $_REQUEST['nomeAmbiente'];
    $smarty->assign("nomeAmbiente",$nomeAmbiente);
}else{
    $nomeAmbiente = "";
}

if(isset($_REQUEST['descAmbiente'])){
    $descAmbiente = $_REQUEST['descAmbiente'];
    $smarty->assign("descAmbiente",$descAmbiente);
}else{
    $descAmbiente = "";
}

$ambientes = $DAO->getAmbienteByFiltro($nomeAmbiente,$descAmbiente); 
$total = count($ambientes); 

$smarty->assign("ambientes",$ambientes);
$smarty->assign("totalAmbientes",$total);
$smarty->display("listaAmbiente.html");
?>
