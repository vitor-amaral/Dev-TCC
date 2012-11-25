<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Produto.class.php");      
require_once("../M/dao/ProdutoDAO.class.php");

$con = new Conexao();

$DAO = new ProdutoDAO($con->getConexao());                     


if(isset($_REQUEST['bebida'])){
    $bebida = $_REQUEST['bebida'];
    $smarty->assign("bebida",$bebida);
}else{
    $bebida = "";
}


$bebidas = $DAO->getProdutoByTipo(2);//tipo = bebida  

$smarty->assign("bebidas",$bebidas);
$smarty->display("consumoBebida.html");