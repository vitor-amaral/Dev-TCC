<?php
	define('SMARTY_DIR','../V/Smarty/libs/');
	
	require SMARTY_DIR."Smarty.class_1.php";
	
	$smarty = new Smarty;
	$smarty->compile_check = true;
	$smarty->debugging = false;
	
	$smarty->template_dir = '../V/smarty/templates/';
	$smarty->compile_dir = '../V/smarty/templates_c/';
	$smarty->config_dir = '../V/smarty/configs/';
	$smarty->cache_dir = '../V/smarty/cache/';
	
?>