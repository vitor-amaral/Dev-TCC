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
//$perguntas = $PerguntaDAO->getPerguntas_All();
//$respostas = $RespostaDAO->getRespostas_All();
$categorias = $CategoriaDAO->getCategoriaResposta_all();  

foreach ($categorias as $cat) { 
    //echo "<p>1:".$p->getCatResp_Descricao()."<br>" ;  
    $respostas[$cat->getCatResp_ID()] = $RespostaDAO->getRespostabyCategoria($cat->getCatResp_ID());
    
    //foreach ($resposta[$p->getCatResp_ID()] as $r) { 
    //   echo "".$r->getResp_Valor()."  " ; 
    //}
}   


/*foreach ($perguntas as $cat) { 
    echo "<p>1:".$cat->getPerg_Descricao()."<br>" ;  
    
    if(isset($preferencias[$cat->getPerg_ID()])){
    echo(count($preferencias[$cat->getPerg_ID()]));
        //foreach ($preferencias[$cat->getPerg_ID()] as $r) {  
         echo "Resp:".$preferencias[$cat->getPerg_ID()]->getResp_ID();
         echo "Op:".$preferencias[$cat->getPerg_ID()]->getPref_Opcao();
         echo "com:".$preferencias[$cat->getPerg_ID()]->getPref_Comentario();
    //}
    } 
}        */


$msg = "Cadastro";
$nomeBotao = "Salvar";
$Save = "s"; 

$smarty->assign("preferencias",$preferencias); //para grid
$smarty->assign("categorias",$categorias);  
$smarty->assign("respostas",$respostas);  

$smarty->assign("msg",$msg); 
$smarty->assign("nomeBotao",$nomeBotao);
$smarty->assign("Save",$Save);   
$smarty->display("cadPreferencia.html");
?>
