<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Ambiente.class.php");      
require_once("../M/dao/AmbienteDAO.class.php");

$con = new Conexao();

$DAO = new AmbienteDAO($con->getConexao());

if(isset($_REQUEST['idAmbiente'])){
    
    $Exc = $DAO->getAmbiente($_REQUEST['idAmbiente']);
    $retorno = $DAO->delete($Exc);
    
    if($retorno) $ret = "se";  else $ret="ee";
}


header("location:listaAmbientes.php?ret=".$ret);
?>
