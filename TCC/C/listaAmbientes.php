<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Ambiente.class.php");
require_once("../M/dao/AmbienteDAO.class.php");


$con = new Conexao();


$smarty->display("listaAmbiente.html");
?>
