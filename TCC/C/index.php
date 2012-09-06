<?php

require_once("SmartyConf.php");

$pagina = explode('/', $_SERVER["PHP_SELF"]) ;

$smarty->assign('pagina',$pagina[3]);
$smarty->display("index.html");
?>