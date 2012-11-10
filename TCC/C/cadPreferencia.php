<?php

error_reporting(E_ALL);
ini_set('display_errors', '0');// NÃO HABILITADO

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php"); 
require_once("../M/classes/PreferenciaCliente.class.php");      
require_once("../M/dao/PreferenciaClienteDAO.class.php");
require_once("../M/classes/PreferenciaClienteRef.class.php");      
require_once("../M/dao/PreferenciaClienteRefDAO.class.php");
//require_once("../M/classes/Pergunta.class.php");      
//require_once("../M/dao/PerguntaDAO.class.php");
require_once("../M/classes/Resposta.class.php");      
require_once("../M/dao/RespostaDAO.class.php");
require_once("../M/classes/CategoriaResposta.class.php");      
require_once("../M/dao/CategoriaRespostaDAO.class.php");
     
$con = new Conexao();

$DAO = new PreferenciaClienteDAO($con->getConexao());
$DAORef = new PreferenciaClienteRefDAO($con->getConexao());
//$PerguntaDAO = new PerguntaDAO($con->getConexao());
$RespostaDAO = new RespostaDAO($con->getConexao());
$CategoriaDAO = new CategoriaRespostaDAO($con->getConexao());

if(isset($_REQUEST['idCliente'])){
    $idCliente = $_REQUEST['idCliente'];
    $smarty->assign("idCliente",$idCliente);
}else{
    $idCliente = "";
}
 
$categorias = $CategoriaDAO->getCategoriaResposta_all();  

foreach ($categorias as $cat) { 
    $respostas[$cat->getCatResp_ID()] = $RespostaDAO->getRespostabyCategoria($cat->getCatResp_ID());
}  


$preferencias = $DAO->getPreferencias_Filtro($idCliente,'','',''); 
$preferenciasref = $DAORef->getPreferencias_Filtro($idCliente,'','');

$msg = "Alterar";
$nomeBotao = "Salvar";
$Save = "a"; 

$total = count($preferencias);  
$totalref = count($preferenciasref);
                                          
$smarty->assign("categorias",$categorias);  
$smarty->assign("respostas",$respostas); 

$smarty->assign("preferencias",$preferencias); //para grid
$smarty->assign("preferenciasref",$preferenciasref); //para grid   
$smarty->assign("total",$total);
$smarty->assign("maiorid",$total);
$smarty->assign("totalref",$totalref);
$smarty->assign("maioridref",$totalref); 

$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);   
$smarty->display("cadPreferencia.html");
?>
