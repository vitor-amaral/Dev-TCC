<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Evento.class.php");
require_once("../M/dao/EventoDAO.class.php");

$con = new Conexao();
$DAO = new EventoDAO($con->getConexao());


if(isset($_REQUEST['nomeEvento'])){
    $nomeEvento = $_REQUEST['nomeEvento'];
    $smarty->assign("nomeEvento",$nomeEvento);
}else{
    $nomeEvento = "";
}

if(isset($_REQUEST['temaEvento'])){
    $temaEvento = $_REQUEST['temaEvento'];
    $smarty->assign("temaEvento",$temaEvento);
}else{
    $temaEvento = "";
}

if(isset($_REQUEST['dtEvento'])){
    $dtEvento = $_REQUEST['dtEvento'];
    $smarty->assign("dtEvento",$dtEvento);
}else{
    $dtEvento = "";
}

if(isset($_REQUEST['obsEvento'])){
    $descEvento = $_REQUEST['obsEvento'];
    $smarty->assign("obsEvento",$descEvento);
}else{
    $descEvento = "";
}

$eventos = $DAO->getEvento_Filtro($nomeEvento,$temaEvento,$descEvento,$dtEvento,$hrEvento); 

$total = count($eventos); 


$smarty->assign("eventos",$eventos);
$smarty->assign("totalEventos",$total);
$smarty->display("listaEvento.html");
?>
