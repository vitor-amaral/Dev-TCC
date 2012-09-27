<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php"); 
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");
require_once("../M/classes/Funcionario.class.php"); 
require_once("../M/dao/FuncionarioDAO.class.php"); 
require_once("../M/classes/Endereco.class.php");
require_once("../M/dao/EnderecoDAO.class.php");   
require_once("../M/classes/Telefone.class.php"); 
require_once("../M/dao/TelefoneDAO.class.php");
require_once("../M/classes/Cidade.class.php"); 
require_once("../M/dao/CidadeDAO.class.php");

$con = new Conexao();

$DAO = new ClienteDAO($con->getConexao());
$enderecoDao = new EnderecoDAO($con->getConexao());
$telefoneDao = new TelefoneDAO ($con->getConexao());
$cidadeDao = new CidadeDAO($con->getConexao());

if(isset($_REQUEST['idCliente'])){
    $idCliente = $_REQUEST['idCliente'];
}else{
    $idCliente = "";
}

$msg ="";
$Save="";
                     
$totalEndereco = 0;
$totalTelefone = 0;
if($idCliente != ""){
    $cliente = $DAO->getCliente($idCliente);
    $msg="Alterar";
    $nomeBotao = "Salvar";
    $Save="a";

    $endereco = $enderecoDao->getEnderecosCliente($idCliente);
    $telefone = $telefoneDao->getTelefonesCliente($idCliente);
    
    $totalEndereco = count($endereco);
    $totalTelefone = count($telefone);

    $smarty->assign("endereco",$endereco);
    $smarty->assign("telefone",$telefone);
   
}else{   
    $cliente = new Cliente();     
    $msg = "Cadastro";
    $nomeBotao = "Salvar";
    $Save = "s";  
}

$indicadores = $DAO->getClientes_MenosFiltro($idCliente); 
$cidades = $cidadeDao->getCidades(); 


$smarty->assign("totalEndereco",$totalEndereco);
$smarty->assign("maiorEndid",$totalEndereco); 
$smarty->assign("totalTelefone",$totalTelefone);
$smarty->assign("maiortelid",$totalTelefone);
$smarty->assign("cliente",$cliente); 
$smarty->assign("indicadores",$indicadores); 
$smarty->assign("cidades",$cidades); 
$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);   
$smarty->display("cadCliente.html");
?>
