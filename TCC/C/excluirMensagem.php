<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Mensagem.class.php");      
require_once("../M/dao/MensagemDAO.class.php");

$con = new Conexao();

$DAO = new MensagemDAO($con->getConexao());

if(isset($_REQUEST['idMensagem'])){
    
    $Exc = $DAO->getMensagem($_REQUEST['idMensagem']);
    $retorno = $DAO->delete($Exc);
    
    if($retorno) $ret = "se";  else $ret="ee";
}


header("location:listaMensagens.php?ret=".$ret);
?>
