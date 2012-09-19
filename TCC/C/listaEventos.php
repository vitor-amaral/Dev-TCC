<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Evento.class.php");
require_once("../M/dao/EventoDAO.class.php");


$con = new Conexao();
$smarty->display("listaEvento.html");
?>
