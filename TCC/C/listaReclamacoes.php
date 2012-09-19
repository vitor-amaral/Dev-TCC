<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
/*require_once("../M/classes/Reclamacao.class.php");
require_once("../M/dao/ReclamacaoDAO.class.php");*/


$con = new Conexao();
$smarty->display("listaReclamacao.html");
?>
