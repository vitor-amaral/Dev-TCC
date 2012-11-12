<?php
       
require_once("../M/dao/Conexao.class.php");
require_once("../M/classes/PreferenciaClienteRef.class.php");      
require_once("../M/dao/PreferenciaClienteRefDAO.class.php");
require_once("../M/classes/Funcionario.class.php");      
require_once("../M/dao/FuncionarioDAO.class.php");

$con = new Conexao();

$funcDAO = new FuncionarioDAO($con->getConexao());

echo("
    <table class=\"table table-striped table-bordered table-condensed\">
        <tr>
            <th>Selecione</th>
            <th></th>
        </tr>
");

if($_REQUEST['catresptab'] == 'funcionario'){      
    $funcionarios = $funcDAO->getFuncionarios(); 
    foreach($funcionarios as $v){
        echo("
            <tr>
                <td>".$v->getFuncionario_Nome()."</td>
                <td><input type=\"radio\" name=\"respostaref\" value='".$v->getFuncionario_ID()."|".$v->getFuncionario_Nome()."'></td> 
            </tr>
        ");
    }  
}
     
?>
