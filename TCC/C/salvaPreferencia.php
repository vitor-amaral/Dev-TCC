<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");
require_once("../M/classes/PreferenciaCliente.class.php");      
require_once("../M/dao/PreferenciaClienteDAO.class.php");
                                                                                                                  
$con = new Conexao();

$DAO = new ClienteDAO($con->getConexao());
$prefDao = new PreferenciaClienteDAO($con->getConexao());  

$cliente = new Cliente;
$pref = new PreferenciaCliente();

$Save = $_REQUEST['Save'];

if($Save == "a"){
    $msg="Alterar";
    $nomeBotao = "Salvar";
      
    $idCliente =  $_REQUEST['idCliente'];
    $cliente->setCli_id($idCliente);
    $pref->setCli_ID($idCliente);

    $retorno = $prefDao->delete_cliente($pref);

    //Retorno Exclusao
    if($retorno) $ret = "sc";  else $ret="ec"; 
    
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

header("location:listaClientes.php?ret=".$ret);
?>
