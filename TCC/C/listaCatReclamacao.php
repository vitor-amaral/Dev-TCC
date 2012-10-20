<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/CategoriaReclamacao.class.php");      
require_once("../M/dao/CategoriaReclamacaoDAO.class.php");

$con = new Conexao();

$DAO = new CategoriaReclamacaoDAO($con->getConexao());

if(isset($_REQUEST['catReclamacao'])){
    $catReclamacao = $_REQUEST['catReclamacao'];
}else{
    $catReclamacao = "";
}

if($catReclamacao != ""){   
    $categorias = $DAO->getCatReclamacaoByDesc($catReclamacao);
    $smarty->assign("descricao",$catReclamacao);
}else{
    $categorias = $DAO->getCatReclamacoes();
}

$totalCategorias = count($categorias);    

$smarty->assign("ret",$_REQUEST['ret']);       
$smarty->assign("totalCategorias",$totalCategorias);
$smarty->assign("categorias",$categorias);
$smarty->display("listaCatReclamacao.html");