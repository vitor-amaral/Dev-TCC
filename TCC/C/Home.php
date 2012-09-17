<?php

require_once("SmartyConf.php");
/*require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Home.class.php");
require_once("../M/dao/HomeDAO.class.php");


$con = new Conexao();

$HomeDao = new HomeDAO($con->getConexao());*/

$smarty->display("Home.html");
?>
