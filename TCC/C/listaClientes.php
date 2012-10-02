<?php
error_reporting(E_ALL);
ini_set('display_errors', '0');// NÃO HABILITADO
require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Cliente.class.php");      
require_once("../M/dao/ClienteDAO.class.php");
require_once("../M/classes/Usuario.class.php");      
require_once("../M/dao/UsuarioDAO.class.php");
require_once("../M/classes/Telefone.class.php"); 
require_once("../M/classes/Endereco.class.php"); 

$con = new Conexao();
                                          
$DAO = new ClienteDAO($con->getConexao());
$usuarioDAO = new UsuarioDAO($con->getConexao()); 


if(isset($_REQUEST['nomeCliente'])){
    $nome = $_REQUEST['nomeCliente'];
    $smarty->assign("nomeCliente",$nome);
}else{
    $nome = "";
}

if(isset($_REQUEST['referenciaCliente'])){
    $referencia = $_REQUEST['referenciaCliente'];
    $smarty->assign("referenciaCliente",$referencia);
}else{
    $referencia = "";
}

if(isset($_REQUEST['idusuario'])){
    $usuario = $_REQUEST['idusuario'];
    $smarty->assign("idusuario",$usuario);
}else{
   $usuario = "";
}
   
if(isset($_REQUEST['idIndicador'])){
    $indicador = $_REQUEST['idIndicador'];
    $smarty->assign("idIndicador",$indicador);
}else{
   $indicador = "";
}
  
if(isset($_REQUEST['dtNasc'])){
    $nascimento = $_REQUEST['dtNasc'];
    $smarty->assign("dtNasc",$nascimento);
}else{
   $nascimento = "";
}

if(isset($_REQUEST['apelido'])){
    $apelido = $_REQUEST['apelido'];
    $smarty->assign("apelido",$apelido);
}else{
   $apelido = "";
}

if(isset($_REQUEST['email'])){
    $email = $_REQUEST['email'];
    $smarty->assign("email",$email);
}else{
   $email = "";
}

if(isset($_REQUEST['estCivil'])){
    $estCivil = $_REQUEST['estCivil'];
    $smarty->assign("estCivil",$estCivil);
}else{
   $estCivil = "";
}

$clientes = $DAO->getClientes_Filtro($nome,$referencia,$nascimento, $email,$usuario,$estCivil,$apelido,$indicador);
$indicadores = $DAO->getClientes();

/*foreach ($clientes as $v) {                    

echo "Nome:".$v->getCli_Nome()."\n";
foreach ($v->getEnderecos() as $s) { 
      echo "{End}:".$s->getEnd_Rua()."\n";  
}
} */

$total = count($clientes);

//$usuarios = $usuarioDAO->getUsuarios(); 
  
$smarty->assign("ret",$_REQUEST['ret']); 
$smarty->assign("totalClientes",$total);
$smarty->assign("clientes",$clientes);
$smarty->assign("indicadores",$indicadores); 
                                                    
//$smarty->assign("usuarios",$usuarios); 
$smarty->display("listaCliente.html");