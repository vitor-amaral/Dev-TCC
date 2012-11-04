<?php

require_once("SmartyConf.php");                  
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Ambiente.class.php");
require_once("../M/dao/AmbienteDAO.class.php");
           
$con = new Conexao();
$DAO = new AmbienteDAO($con->getConexao());
$Save = $_REQUEST['Save'];

$ambiente = new Ambiente();
$ambiente->setAmb_Nome($_REQUEST['nomeAmbiente']);
$ambiente->setAmb_Descricao($_REQUEST['descAmbiente']);

if(!isset($msg))

if($Save == "s"){         
    $msg="Cadastro";
    $retorno = $DAO->inserir($ambiente);
    
    $nomeBotao = "Salvar";
    $Alterado = new Ambiente();      
    
    if($retorno) $ret = "sc";  else $ret="ec";     

}

if($Save == "a"){
    $msg="Alterar";
    $ambiente->setAmb_ID($_REQUEST['idAmbiente']);
    $retorno = $DAO->alterar($ambiente);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getAmbiente($ambiente->getAmb_ID());
    
    if($retorno) $ret = "sa";  else $ret="ea";
}


$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("ambiente",$Alterado);
$smarty->assign("msg",$msg);
$smarty->assign("ret",$ret);       
$smarty->display("cadAmbiente.html");
?>
