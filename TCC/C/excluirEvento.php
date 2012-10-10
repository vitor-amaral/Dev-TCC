<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Evento.class.php");      
require_once("../M/dao/EventoDAO.class.php");

$con = new Conexao();

$DAO = new EventoDAO($con->getConexao());

if(isset($_REQUEST['idEvento'])){
    
    $Exc = $DAO->getEvento($_REQUEST['idEvento']);
    $retorno = $DAO->delete($Exc);
    
    if($retorno) $ret = "se";  else $ret="ee";
}


header("location:listaEventos.php?ret=".$ret);
?>
