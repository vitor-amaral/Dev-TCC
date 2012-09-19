<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Mensagem.class.php");
require_once("../M/dao/MensagemDAO.class.php");


$con = new Conexao();
$smarty->display("listaMensagem.html");
?>
