<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Usuario.class.php");      
require_once("../M/dao/UsuarioDAO.class.php");

$con = new Conexao();

$DAO = new UsuarioDAO($con->getConexao());

if(isset($_REQUEST['idUsuario'])){
    
    $Exc = $DAO->getUsuario($_REQUEST['idUsuario']);
    $DAO->delete($Exc);
}


header("location:listaUsuarios.php");
?>
