<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Cidade.class.php");      
require_once("../M/dao/CidadeDAO.class.php");

$con = new Conexao();

$DAO = new CidadeDAO($con->getConexao());

if(isset($_REQUEST['nomeCidade'])){
    $nome = $_REQUEST['nomeCidade'];
}else{
    $nome = "";
}

if($nome != ""){   
    $cidades = $DAO->getCidadeByNome($nome);
    $smarty->assign("nomeCidade",$nome);
}else{
    $cidades = $DAO->getCidades();
}

$totalCidades = count($cidades);    
       
$smarty->assign("totalCidades",$totalCidades);
$smarty->assign("cidades",$cidades);
$smarty->display("listaCidade.html");