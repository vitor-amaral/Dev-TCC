<?php /* Smarty version 2.6.26, created on 2012-09-13 04:23:26
         compiled from listaCliente.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Clientes</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap-collapse.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap-modal.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.maskedinput.js"></script>
        <script type="text/javascript" >
                     
    
                                           
            $(function(){
                $(".collapse").collapse();
                /*$("#telefoneAutor").mask("(99) 9999-9999");
                $("#cpfAutor").mask("999.999.999-99");
                $("#cnpjAutor").mask("99.999.999/9999-99");
                $("#cep").mask("99999-999");    */
            });

        
           function abreNovo(){
               window.location.href="cadCliente.php";
           }
           
           function editar(idCliente){
             window.location.href="cadCliente.php?idCliente="+idCliente;  
             
           }
           
           function preferencia(idCliente){
             //window.location.href="cadCliente.php?idCliente="+idCliente;  
             alert("exibe tela preferencia");
             
           }
                      
           function enviar(){
               $("#formCliente").submit();

           }
           
           function excluir(idCliente){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirCliente.php?idCliente="+idCliente;
               }else{
                   return false;
               }            
           } 
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalClientes'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Clientes :: Listagem</legend>
                        <form class="well form-search" name="formCliente" id="formCliente" method="POST" action="listaClientes.php">
                        <div class="control-group">
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="nomeCliente" class="control-label" style="font-size:13px;">Nome:</label>
                                <input type="text" id="nomeCliente" name="nomeCliente" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['nomeCliente']; ?>
">      
 
                                <label for="referenciaCliente" class="control-label" style="font-size:13px;">Referência:</label>
                                <input type="text" id="referenciaCliente" name="referenciaCliente" class="input-xlarge arrendondaInputSelect" placeholder="Como lembrar do cliente..." value="<?php echo $this->_tpl_vars['referenciaCliente']; ?>
"> 
                            </div> 
                                                  
                            <div id="accordion2" class="accordion">                                
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a href="#collapseTwo" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                                            <i class="icon-plus-sign"></i> Busca Detalhada
                                        </a>
                                    </div>
                                    <div class="accordion-body in collapse" id="collapseTwo" style="height: 0px;">
                                        <div class="accordion-inner">
                                            
                                            <div class="controls" style="margin-bottom:10px;">                                 
                                                <label for="nomeAutor" class="control-label" style="font-size:13px;">Nome:</label>
                                                <input type="text" id="nomeAutor" name="nomeAutor" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['nomeProcura']; ?>
">
                                                <br/><br/>
                                                <label for="cpfAutor" class="control-label" style="font-size:13px;">CPF:</label>
                                                <input type="text" name="cpfAutor" id="cpfAutor" class="input-medium arrendondaInputSelect" value="" />
                                                
                                                <label for="rgAutor" class="control-label" style="font-size:13px;">RG:</label>
                                                <input type="text" id="rgAutor" name="rgAutor"  class="input-medium arrendondaInputSelect" value="" />
                                                
                                                <label for="cnpjAutor" class="control-label" style="font-size:13px;">CNPJ:</label>
                                                <input type="text" id="cnpjAutor" name="cnpjAutor"  class="input-medium arrendondaInputSelect" value=""/>
                                            </div>    
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Filtro por usuário que cadastrou o cliente -->
                            <!--                                   
                            <div class="controls" style="margin-bottom:10px;">   
                                <label for="idusuario" class="control-label" style="font-size:13px;">Usuario:</label>
                                <select id="idusuario" name="idusuario" class="arrendondaInputSelect">
                                   <option value=""></option>
                                    <?php $_from = $this->_tpl_vars['usuarios']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['usuario']):
?>
                                    <option value="<?php echo $this->_tpl_vars['usuario']->getCargo_ID(); ?>
" <?php if ($this->_tpl_vars['usuario']->getCargo_ID() == $this->_tpl_vars['idusuario']): ?> selected='selected' <?php endif; ?> ><?php echo $this->_tpl_vars['usuario']->getCargo_Descricao(); ?>
</option> 
                                    <?php endforeach; endif; unset($_from); ?>
                                </select>                    
                            </div> -->
                            
                            <div>    
                                <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                            </div>
                        </div> 
                        </form>
                    </fieldset>
                    <button onclick="return abreNovo();" class="btn btn-info">Novo Cliente</button>
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Nome</th>
                                  <th>Referencia</th>
                                  <th>Dt Nasc</th> 
                                  <th>Email</th> 
                                  <th>Usu Cadastro</th>
                                  <th>Est Civil</th> 
                                  <th>Apelido</th> 
                                  <th>Cli Indicador</th>                                
                                  <th class=tdBotao>Editar</th>
                                  <th class=tdBotao>Excluir</th>
                                  <th class=tdBotao>Preferências</th>
                              </tr>                 
                              <?php $_from = $this->_tpl_vars['clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cliente']):
?>
                              
                              <tr>
                                  <td><?php echo $this->_tpl_vars['cliente']->getCli_nome(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['cliente']->getCli_referencia(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['cliente']->getCli_dtNasc(); ?>
</td>                                    
                                  <td><?php echo $this->_tpl_vars['cliente']->getCli_email(); ?>
</td>                                    
                                  <td><?php echo $this->_tpl_vars['cliente']->getUsu_login(); ?>
</td>  
                                  <td><?php echo $this->_tpl_vars['cliente']->getCli_estCivil(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['cliente']->getCli_apelido(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['cliente']->getCli_indicador(); ?>
</td>         
                                  <td><a href="#" onclick="return editar('<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
');"  title="Clique para Editar este Cliente"><i class="icon-edit"></i></a></td>                                  
                                  <td><a href="#" onclick="return excluir('<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
');" alt="Clique para Excluir este Cliente"><i class="icon-trash"></i></a></td>
                                  <td><a href="#" onclick="return preferencia('<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
');" alt="Clique para Editar as preferencias deste Cliente"><i class="icon-heart"></i></a></td>
                               
                              </tr>
                              
                              <?php endforeach; endif; unset($_from); ?>
                          </table>
                    </div>
            </div>
       </div>
    </body>
</html>