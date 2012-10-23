<?php /* Smarty version 2.6.26, created on 2012-10-05 04:46:30
         compiled from listaCliente.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'listaCliente.html', 215, false),)), $this); ?>
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
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap-tooltip.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap-modal.js"></script> 
                      
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.maskedinput.js"></script>
        <script type="text/javascript" >
                                           
            $(function(){
                $(".collapse").collapse();
                $("#dtNasc").mask("99/99/9999");
                $("[rel=tooltip]").tooltip();
            });   
        
           function abreNovo(){
               window.location.href="cadCliente.php";
           }
           
           function editar(idCliente){
             window.location.href="cadCliente.php?idCliente="+idCliente;  
             
           }
           
           function excluir(idCliente){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirCliente.php?idCliente="+idCliente; 
               }else{
                   return false;
               }            
           } 
                      
           function preferencia(idCliente){
               window.location.href="cadPreferencia.php?idCliente="+idCliente;
             
           }
                      
           function enviar(){
               $("#formCliente").submit();

           } 
           
           //-----------Modal--------------------------------------
            function abreModal(id) {
                $(\'#windowTitleDialog\'+id).bind(\'show\', function () {
                   // document.title = "Modal";
                });
            }
            
            function closeDialog () {
                $(\'#windowTitleDialog\').modal(\'hide\');
            };
            function okClicked () {
                document.title = "Modal"; 
                closeDialog ();
            };            
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalClientes'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">
                    <?php if ($this->_tpl_vars['ret'] == 'se'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Cliente foi Excluido com Sucesso!</span>
                    <?php endif; ?>
       
                    <?php if ($this->_tpl_vars['ret'] == 'ee'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel excluir. Confira se o cliente é indicador.</span>
                    <?php endif; ?>       
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Clientes :: Listagem</legend>
                        <form class="well form-search" name="formCliente" id="formCliente" method="POST" action="listaClientes.php">
                        <div class="control-group">
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="nomeCliente" class="control-label">Nome:</label>
                                <input type="text" id="nomeCliente" name="nomeCliente" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['nomeCliente']; ?>
">      
 
                                <label for="referenciaCliente" class="control-label">Referência:</label>
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
                                                <label for="dtNasc" class="control-label">Data Nascimento:</label>
                                                <input type="text" id="dtNasc" name="dtNasc" class="input-small arrendondaInputSelect" value="<?php echo $this->_tpl_vars['dtNasc']; ?>
">

                                                <label for="apelido" class="control-label">Apelido:</label>
                                                <input type="text" id="apelido" name="apelido"  class="input-medium arrendondaInputSelect" value="<?php echo $this->_tpl_vars['apelido']; ?>
" />
                                                                                                
                                                <br/><br/>
                                                <label for="email" class="control-label">Email:</label>
                                                <input type="text" name="email" id="email" class="input-xxlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['email']; ?>
" />
                                                                                                
                                                <br/><br/> 
                                                <label for="estCivil" class="control-label" >Relacionamento:</label>
                                                <select id="estCivil" name="estCivil" class="arrendondaInputSelect">
                                                   <option value=""></option>
                                                   <option value="1" <?php if ($this->_tpl_vars['estCivil'] == 1): ?> selected='selected' <?php endif; ?> >Solteiro</option> 
                                                   <option value="2" <?php if ($this->_tpl_vars['estCivil'] == 2): ?> selected='selected' <?php endif; ?> >Casado/União Estável</option>
                                                   <option value="3" <?php if ($this->_tpl_vars['estCivil'] == 3): ?> selected='selected' <?php endif; ?> >Divorciado</option>
                                                   <option value="4" <?php if ($this->_tpl_vars['estCivil'] == 4): ?> selected='selected' <?php endif; ?> >Namorando</option>
                                                   <option value="5" <?php if ($this->_tpl_vars['estCivil'] == 5): ?> selected='selected' <?php endif; ?> >Viúvo</option>
                                                </select>
                                                
                                                <label for="idIndicador" class="control-label" >Indicador:</label>
                                                <select id="idIndicador" name="idIndicador" class="arrendondaInputSelect" >
                                                   <option value=""></option>
                                                    <?php $_from = $this->_tpl_vars['indicadores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['indicador']):
?>
                                                    <option value="<?php echo $this->_tpl_vars['indicador']->getCli_id(); ?>
" <?php if ($this->_tpl_vars['indicador']->getCli_id() == $this->_tpl_vars['idIndicador']): ?> selected='selected' <?php endif; ?> >
                                                    <?php echo $this->_tpl_vars['indicador']->getCli_nome(); ?>
 -- <?php echo $this->_tpl_vars['indicador']->getCli_referencia(); ?>
  
                                                    </option> 
                                                    <?php endforeach; endif; unset($_from); ?>
                                                </select>                                                    

                                            </div>    
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Filtro por usuário que cadastrou o cliente -->
                            <!--                                   
                            <div class="controls" style="margin-bottom:10px;">   
                                <label for="idusuario" class="control-label" >Usuario:</label>
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
                                  <th>Est Civil</th> 
                                  <th>Apelido</th> 
                                  <th>Indicador</th>                                
                                  <th>Ações</th>
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
                                      <td><?php echo $this->_tpl_vars['cliente']->getCli_estCivilDesc(); ?>
</td>
                                      <td><?php echo $this->_tpl_vars['cliente']->getCli_apelido(); ?>
</td>
                                      <td><?php echo $this->_tpl_vars['cliente']->getCli_indicador(); ?>
</td>         
                                      <td>
                                        <a href="#windowTitleDialog<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
" rel="tooltip" onclick="abreModal('<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
');" title="Clique para Visualizar informações deste Cliente" data-toggle="modal"><i class="icon-book"></i></a>
                                        <a href="#" rel="tooltip" onclick="return editar('<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
');"  title="Clique para Editar este Cliente"><i class="icon-edit"></i></a>                                  
                                        <a href="#" rel="tooltip" onclick="return excluir('<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
');" title="Clique para Excluir este Cliente"><i class="icon-trash"></i></a>
                                        <a href="#" rel="tooltip" onclick="return preferencia('<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
');" title="Clique para Editar as preferencias deste Cliente"><i class="icon-heart"></i></a>                                    
                                      </td>
                                  </tr>
                              <?php endforeach; endif; unset($_from); ?>
                          </table>
                          <?php $_from = $this->_tpl_vars['clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cliente']):
?>
                              <div id="windowTitleDialog<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
" class="modal hide fade">
                                <div class="modal-header">
                                    <a data-dismiss="modal" class="close" href="#">×</a>
                                    <h5>Detalhes Cliente</h5>  
                                </div>
                                <div class="modal-body" style="overflow:auto;height:400px;">
 
                                    <div class="divDialogElements"> 
                                        <ul>
                                            <li>Nome: <?php echo $this->_tpl_vars['cliente']->getCli_nome(); ?>
</li>
                                            <li>Referência: <?php echo $this->_tpl_vars['cliente']->getCli_referencia(); ?>
</li> 
                                            <li>Apelido: <?php echo $this->_tpl_vars['cliente']->getCli_apelido(); ?>
</li>
                                              
                                            <li>Data Nascimento: <?php echo $this->_tpl_vars['cliente']->getCli_dtNasc(); ?>
</li> 
                                            <li>Estado Civil: <?php echo $this->_tpl_vars['cliente']->getCli_estCivilDesc(); ?>
</li>
                                             <li>Email: <?php echo $this->_tpl_vars['cliente']->getCli_email(); ?>
</li>
                                             
                                            <li>Cliente Indicador: <?php echo $this->_tpl_vars['cliente']->getCli_indicador(); ?>
 -- </li>
                                            <li>Usuário que efetuou o cadastro: <?php echo $this->_tpl_vars['cliente']->getUsu_login(); ?>
</li>
                                        </ul>      
                                           
                                        <?php if (count($this->_tpl_vars['cliente']->getEnderecos()) > 0): ?>  
                                            <span style="background-color:#4D9DA8;" class="label">Endereços</span>
                                            <table class="table table-striped table-bordered table-condensed">
                                                <tr>
                                                    <th>Logradouro</th>
                                                    <th>Nº</th>
                                                    <th>Complemento</th>
                                                    <th>Bairro</th>
                                                    <th>Cep</th>
                                                    <th>Cidade</th>
                                                </tr>
                                                <?php $_from = $this->_tpl_vars['cliente']->getEnderecos(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['end']):
?>                                                             
                                                    <tr>
                                                        <td><?php echo $this->_tpl_vars['end']->getEnd_Rua(); ?>
</td>
                                                        <td><?php echo $this->_tpl_vars['end']->getEnd_Num(); ?>
</td>
                                                        <td><?php echo $this->_tpl_vars['end']->getEnd_Complemento(); ?>
</td>
                                                        <td><?php echo $this->_tpl_vars['end']->getEnd_Bairro(); ?>
</td>
                                                        <td><?php echo $this->_tpl_vars['end']->getEnd_Cep(); ?>
</td>
                                                        <td><?php echo $this->_tpl_vars['end']->getCid_Nome(); ?>
 / <?php echo $this->_tpl_vars['end']->getUf_Sigla(); ?>
</td>
                                                    </tr>
                                                 <?php endforeach; endif; unset($_from); ?>
                                             </table> 
                                         <?php endif; ?> 
                                                                                      
                                        <?php if (count($this->_tpl_vars['cliente']->getTelefones()) > 0): ?>  
                                            <span style="background-color:#4D9DA8;" class="label">Telefones</span>
                                            <table class="table table-striped table-bordered table-condensed">
                                                <tr>
                                                    <th>Número</th>
                                                    <th>Tipo</th> 
                                                    <th>Obs</th>
                                                </tr>
                                                <?php $_from = $this->_tpl_vars['cliente']->getTelefones(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fone']):
?> 
                                                    <tr>
                                                        <td><?php echo $this->_tpl_vars['fone']->getTel_Telefone(); ?>
</td>
                                                        <td><?php echo $this->_tpl_vars['fone']->getTel_TipoDesc(); ?>
</td>
                                                        <td><?php echo $this->_tpl_vars['fone']->getTel_Observacao(); ?>
</td>
                                                    </tr>
                                                <?php endforeach; endif; unset($_from); ?>
                                            </table>                                                 
                                        <?php endif; ?>                                                                                       
                                    </div>
                                </div>
                               </div>
                          <?php endforeach; endif; unset($_from); ?>                              
                    </div>
            </div>
       </div>
    </body>
</html>