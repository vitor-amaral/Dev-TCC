<?php

require_once("SmartyConf.php");                  
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/Mensagem.class.php");
require_once("../M/dao/MensagemDAO.class.php");
           
$con = new Conexao();
$DAO = new MensagemDAO($con->getConexao());


$mensagem = new Mensagem();
$mensagem->setMens_Texto($_REQUEST['mensagem']);
$mensagem->setMens_Titulo($_REQUEST['tituloMensagem']);
$mensagem->setMens_Email($_REQUEST['destinatario']);

//envio de email
//composição do email
//para o envio em formato HTML
//$headers = "MIME-Version: 1.0";
//$headers .= "Content-type: text/html;charset=iso-8859-1";
 
//endereço do remitente
//$headers = "From: Vitor <vitoramaral.ti@gmail.com>";                 
 
//endereços que receberão uma copia $headers .= "Cc: manel@desarrolloweb.com

//endereços que receberão uma copia oculta
//$headers .= "Bcc: vinnie@criarweb.com,joao@criarweb.com";
//ini_set(sendmail_from, "vitoramaral.ti@gmail.com");
//if(mail($mensagem->getMens_Email(),$mensagem->getMens_Titulo(),$mensagem->getMens_Texto(),"From: vitoramaral.ti@gmail.com")){    
if(mail($mensagem->getMens_Email(),$mensagem->getMens_Titulo(),$mensagem->getMens_Texto(),"From: vitoramaral.ti@gmail.com")){    
    $ret = 'sa';
}else{
    $ret = 'ea';
}
$nomeBotao = "Enviar"; 

$smarty->assign("nomeBotao",$nomeBotao); 
$smarty->assign("mensagem",$mensagem);
$smarty->assign("ret",$ret);       
$smarty->display("selecionaMensagem.html");
?>
