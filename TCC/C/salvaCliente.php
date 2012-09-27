<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");
require_once("../M/classes/Endereco.class.php");
require_once("../M/dao/EnderecoDAO.class.php");
require_once("../M/classes/Telefone.class.php");
require_once("../M/dao/TelefoneDAO.class.php");

$con = new Conexao();

$DAO = new ClienteDAO($con->getConexao());
$enderecoDao = new EnderecoDAO($con->getConexao());
$telefoneDao = new TelefoneDAO($con->getConexao());

$cliente = new Cliente;
$endereco = new Endereco();
$telefone = new Telefone();

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

$Save = $_REQUEST['Save'];

if(!isset($msg))

if($Save == "s"){
    $msg="Cadastro";
    $idCliente = $DAO->inserir($cliente);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getCliente($idCliente);     
    
    //Retorno Cadastro Cliente
    if($idCliente) $ret = "sc";  else $ret="ec";  
    
    //Inserir ENDERECO
    if($_REQUEST['totalEndereco'] > 0){
        for ($i = 0; $i < $_REQUEST['totalEndereco'];$i++){                          
            $endereco->setEnd_Rua($_REQUEST['end'][$i]);
            $endereco->setEnd_Num($_REQUEST['num'][$i]);
            $endereco->setEnd_Complemento($_REQUEST['comp'][$i]);
            $endereco->setEnd_Cep($_REQUEST['ceptab'][$i]);
            $endereco->setEnd_Bairro($_REQUEST['bairrotab'][$i]); 
            $endereco->setCid_ID($_REQUEST['cid'][$i]); 
            $endereco->setCli_ID($idCliente);

            $retorno = $enderecoDao->inserir($endereco);

            //Retorno Cadastro ENDERECO
            if($retorno) $ret = "sc";  else $ret="ec"; 
        }
    }     
    
    //Inserir TELEFONE 
    if($_REQUEST['totalTelefone'] > 0){
        for ($i = 0; $i < $_REQUEST['totalTelefone'];$i++){
            $telefone->setTel_Telefone($_REQUEST['tel'][$i]);
            $telefone->setTel_Tipo($_REQUEST['tipoTel'][$i]);
            $telefone->setTel_Observacao($_REQUEST['obsTel'][$i]);
            $telefone->setCli_ID($idCliente);

            $retorno = $telefoneDao->inserir($telefone);

            //Retorno Cadastro Telefone
            if($retorno) $ret = "sc";  else $ret="ec"; 

        }
    }
}

if($Save == "a"){
    $msg="Alterar";
    $idCliente =  $_REQUEST['idCliente'];
    $cliente->setCli_id($idCliente);
    $telefone->setCli_ID($idCliente);
    $endereco->setCli_ID($idCliente);

    $retorno = $DAO->alterar($cliente);
    
    $nomeBotao = "Salvar";
    $Alterado = $DAO->getCliente($cliente->getCli_id());
    
    if($retorno) $ret = "sa";  else $ret="ea"; 
       
    //Inserir ou alterar ENDERECO
    if($_REQUEST['totalEndereco'] > 0){
        for ($i = 0; $i < $_REQUEST['totalEndereco'];$i++){
            $endereco->setEnd_Rua($_REQUEST['end'][$i]);
            $endereco->setEnd_Num($_REQUEST['num'][$i]);
            $endereco->setEnd_Complemento($_REQUEST['comp'][$i]);
            $endereco->setEnd_Cep($_REQUEST['ceptab'][$i]);
            $endereco->setEnd_Bairro($_REQUEST['bairrotab'][$i]);
            $endereco->setCid_ID($_REQUEST['cid'][$i]); 

            if($_REQUEST['idEndbd'][$i] != "" && $_REQUEST['idEndbd'][$i] != "undefined"){
                $endereco->setEnd_ID($_REQUEST['idEndbd'][$i]);
                $retorno = $enderecoDao->alterar($endereco);
            }else{
                $retorno = $enderecoDao->inserir($endereco);
            }
            
            //Retorno Cadastro ENDERECO
            if($retorno) $ret = "sc";  else $ret="ec"; 
        }
    }  
   
    //Excluir  ENDERECO
    if(($_REQUEST['maiorEndid'] - $_REQUEST['totalEndereco']) > 0){
        for ($i = 0; $i < ($_REQUEST['maiorEndid'] - $_REQUEST['totalEndereco']);$i++){

            $endereco->setEnd_ID($_REQUEST['EndExcluidos'][$i]);
            $retorno = $enderecoDao->delete($endereco); 
            
            //Retorno Cadastro ENDERECO
            if($retorno) $ret = "sc";  else $ret="ec"; 
        }
    }       
    
    //-----------------------------------------------------------------------------------------
    //Inserir ou alterar TELEFONE
    if($_REQUEST['totalTelefone'] > 0){
        for ($i = 0; $i < $_REQUEST['totalTelefone'];$i++){
            $telefone->setTel_Telefone($_REQUEST['tel'][$i]);
            $telefone->setTel_Tipo($_REQUEST['tipoTel'][$i]);
            $telefone->setTel_Observacao($_REQUEST['obsTel'][$i]);

            if($_REQUEST['idTelbd'][$i] != "" && $_REQUEST['idTelbd'][$i] != "undefined"){
                $telefone->setTel_ID($_REQUEST['idTelbd'][$i]);
                $retorno = $telefoneDao->alterar($telefone);
            }else{
                $retorno = $telefoneDao->inserir($telefone);
            }
            
            //Retorno Cadastro Telefone
            if($retorno) $ret = "sc";  else $ret="ec"; 
        }
    }  
   
    //Excluir  TELEFONE
    if(($_REQUEST['maiortelid'] - $_REQUEST['totalTelefone']) > 0){
        for ($i = 0; $i < ($_REQUEST['maiortelid'] - $_REQUEST['totalTelefone']);$i++){

            $telefone->setTel_ID($_REQUEST['excluidos'][$i]);
            $retorno = $telefoneDao->delete($telefone); 
            
            //Retorno Cadastro Telefone
            if($retorno) $ret = "sc";  else $ret="ec"; 
        }
    }      
    

}

$endereco = $enderecoDao->getEnderecosCliente($idCliente);
$telefone = $telefoneDao->getTelefonesCliente($idCliente);
$indicadores = $DAO->getClientes_MenosFiltro($idCliente);

$totalEndereco = count($endereco);
$totalTelefone = count($telefone);

$smarty->assign("endereco",$endereco);
$smarty->assign("telefone",$telefone);
    
$smarty->assign("totalEndereco",$totalEndereco);
$smarty->assign("totalTelefone",$totalTelefone);
$smarty->assign("maiortelid",$totalTelefone);
$smarty->assign("indicadores",$indicadores); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("cliente",$Alterado);
$smarty->assign("msg",$msg);
$smarty->assign("ret",$ret);
$smarty->display("cadCliente.html");
?>
