<?php

require_once("SmartyConf.php");
require_once("../M/dao/Conexao.class.php"); 
require_once("../M/classes/PreferenciaCliente.class.php");      
require_once("../M/dao/PreferenciaClienteDAO.class.php");
require_once("../M/classes/Pergunta.class.php");      
require_once("../M/dao/PerguntaDAO.class.php");
require_once("../M/classes/Resposta.class.php");      
require_once("../M/dao/RespostaDAO.class.php");
require_once("../M/classes/CategoriaResposta.class.php");      
require_once("../M/dao/CategoriaRespostaDAO.class.php");
     
$con = new Conexao();

$DAO = new PreferenciaClienteDAO($con->getConexao());
$PerguntaDAO = new PerguntaDAO($con->getConexao());
$RespostaDAO = new RespostaDAO($con->getConexao());
$CategoriaDAO = new CategoriaRespostaDAO($con->getConexao());

if(isset($_REQUEST['idCliente'])){
    $idCliente = $_REQUEST['idCliente'];
    $smarty->assign("idCliente",$idCliente);
}else{
    $idCliente = "";
}
   
$preferencias = $DAO->getPreferencias_Filtro($idCliente,'','',''); 
$categorias = $CategoriaDAO->getCategoriaResposta_all();  

foreach ($categorias as $cat) { 
    $respostas[$cat->getCatResp_ID()] = $RespostaDAO->getRespostabyCategoria($cat->getCatResp_ID());
}   
  
$msg = "Alterar";
$nomeBotao = "Salvar";
$Save = "a"; 

$total = count($preferencias);  

$smarty->assign("preferencias",$preferencias); //para grid
$smarty->assign("total",$total);
$smarty->assign("maiorid",$total);
$smarty->assign("categorias",$categorias);  
$smarty->assign("respostas",$respostas);  

$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);   
$smarty->display("cadPreferencia.html");
?>
