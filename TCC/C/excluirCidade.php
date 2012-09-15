<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Cidade.class.php");      
require_once("../M/dao/CidadeDAO.class.php");

$con = new Conexao();

$DAO = new CidadeDAO($con->getConexao());

if(isset($_REQUEST['idCidade'])){
    
    $Exc = $DAO->getCidade($_REQUEST['idCidade']);
    $retorno = $DAO->delete($Exc);
    
    if($retorno) $ret = "se";  else $ret="ee";
}


header("location:listaCidades.php?ret=".$ret);
?>
