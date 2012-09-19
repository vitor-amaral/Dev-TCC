<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Produto.class.php");
require_once("../M/dao/ProdutoDAO.class.php");


$con = new Conexao();


$smarty->display("listaProduto.html");
?>
