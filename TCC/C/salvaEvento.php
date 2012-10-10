<?php

require_once("SmartyConf.php");                  
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Evento.class.php");
require_once("../M/dao/EventoDAO.class.php");
           
$con = new Conexao();
$DAO = new EventoDAO($con->getConexao());
$Save = $_REQUEST['Save'];

$evento = new Evento();
$evento->setEv_Nome($_REQUEST['nomeEvento']);
$evento->setEv_Tema($_REQUEST['temaEvento']);
$evento->setEv_Descricao($_REQUEST['obsEvento']);              
$evento->setEv_Data($_REQUEST['dtEvento']);
$evento->setEv_Hora($_REQUEST['hrEvento']);
$evento->setUsu_id(1);


if(!isset($msg))

if($Save == "s"){         
    $msg="Cadastro";
    $retorno = $DAO->inserir($evento);
    
    $nomeBotao = "Salvar";
    $Alterado = new Evento();      
    
    if($retorno) $ret = "sc";  else $ret="ec";     

}

if($Save == "a"){
    $msg="Alterar";
    $evento->setEv_ID($_REQUEST['idEvento']);
    $retorno = $DAO->alterar($evento);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getEvento($evento->getEv_ID());
    
    if($retorno) $ret = "sa";  else $ret="ea";
}


$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("evento",$Alterado);
$smarty->assign("msg",$msg);
$smarty->assign("ret",$ret);       
$smarty->display("cadEvento.html");
?>
