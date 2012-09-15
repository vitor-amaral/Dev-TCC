<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");

$con = new Conexao();

$DAO = new ClienteDAO($con->getConexao());

$Save = $_REQUEST['Save'];     

$cliente = new Cliente;
$cliente->setCli_Nome($_REQUEST['nomeCliente']);
$cliente->setCli_referencia($_REQUEST['referenciaCliente']);
$cliente->setCli_dtNasc($_REQUEST['dtNasc']);
$cliente->setCli_email($_REQUEST['email']);  
$cliente->setUsu_id(1);   //TODO: colocar o usuário logado no momento      
 
if(isset($_REQUEST['estCivil']) and $_REQUEST['estCivil'] != "") {
    $cliente->setCli_estCivil($_REQUEST['estCivil']); 
}                        

$cliente->setCli_apelido($_REQUEST['apelido']);    
    
if(isset($_REQUEST['idIndicador']) and $_REQUEST['idIndicador'] != "") {
    $cliente->setCli_id_indicador($_REQUEST['idIndicador']);            
}

           

if(!isset($msg))

if($Save == "s"){
    $msg="Cadastro";
    $retorno = $DAO->inserir($cliente);
    
    $nomeBotao = "Salvar";
    $Alterado = new Cliente();      
    
    if($retorno)
     $ret = "s";
}

if($Save == "a"){
    $msg="Alterar";
    $cliente->setCli_id($_REQUEST['idCliente']);

    $retorno = $DAO->alterar($cliente);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getCliente($cliente->getCli_id());
    
    if($retorno)
     $ret = "sa";
}

$indicadores = $DAO->getClientes();

$smarty->assign("indicadores",$indicadores);
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("cliente",$Alterado);
$smarty->assign("msg",$msg);
$smarty->assign("ret",$ret);
$smarty->display("cadCliente.html");
?>
