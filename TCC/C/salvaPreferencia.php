<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");
require_once("../M/classes/PreferenciaCliente.class.php");      
require_once("../M/dao/PreferenciaClienteDAO.class.php");
require_once("../M/classes/PreferenciaClienteRef.class.php");      
require_once("../M/dao/PreferenciaClienteRefDAO.class.php");
                                                                                                                  
$con = new Conexao();

$DAO = new ClienteDAO($con->getConexao());
$prefDao = new PreferenciaClienteDAO($con->getConexao());  
$prefDaoRef = new PreferenciaClienteRefDAO($con->getConexao());

$cliente = new Cliente;
$pref = new PreferenciaCliente();
$prefref = new PreferenciaClienteRef(); 

$Save = $_REQUEST['Save'];

if($Save == "a"){
    $msg="Alterar";
    $nomeBotao = "Salvar";
      
    $idCliente =  $_REQUEST['idCliente'];
    $cliente->setCli_id($idCliente);
    $pref->setCli_ID($idCliente);
    $prefref->setCli_ID($idCliente);

    $retorno = $prefDao->delete_cliente($pref);

    //Retorno Exclusao
    if($retorno){
       $ret = "sc"; 
    
        //Inserir ou alterar Preferencia
        if($_REQUEST['total'] > 0){
            for ($i = 0; $i < $_REQUEST['total'];$i++){
                if($_REQUEST['resp'][$i] != ""){
                    $pref->setCli_ID($idCliente);
                    $pref->setPerg_ID($_REQUEST['perg'][$i]);
                    $pref->setResp_ID($_REQUEST['resp'][$i]);
                    $pref->setPref_Opcao($_REQUEST['op'][$i]);
                    $pref->setPref_Comentario($_REQUEST['com'][$i]); 
                                                               
                    $retorno = $prefDao->inserir($pref);
                                                                   
                    //Retorno Cadastro
                    if($retorno) $ret = "sc";  else $ret="ec"; 
                }
            }
        } 
    } 
    else $ret="ec"; 
    
    $retorno = $prefDaoRef->delete_cliente($prefref);

    //Retorno Exclusao
    if($retorno){
       $ret = "sc"; 
    

        //Inserir ou alterar Preferencia
        if($_REQUEST['totalref'] > 0){
            for ($i = 0; $i < $_REQUEST['totalref'];$i++){
                if($_REQUEST['respref'][$i] != ""){
                    $prefref->setCli_ID($idCliente);
                    $prefref->setPerg_ID($_REQUEST['pergref'][$i]);
                    $prefref->setPref_Resp($_REQUEST['respref'][$i]);
                    $prefref->setPref_Opcao($_REQUEST['opref'][$i]);
                    $prefref->setPref_Comentario($_REQUEST['comref'][$i]); 
                                                               
                    $retorno = $prefDaoRef->inserir($prefref);
                                                                   
                    //Retorno Cadastro
                    if($retorno) $ret = "sc";  else $ret="ec"; 
                }
            }
        } 
    } 
    else $ret="ec";
    
    

}

header("location:listaClientes.php?ret=".$ret);
?>
