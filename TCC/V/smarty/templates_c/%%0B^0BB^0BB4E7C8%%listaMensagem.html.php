<?php /* Smarty version 2.6.26, created on 2012-11-26 20:53:50
         compiled from listaMensagem.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Mensagens</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap.js"></script>     
        
        <script type="text/javascript" >

            $(function(){
                $("[rel=tooltip]").tooltip();
            });
                    
           function abreNovo(){
               window.location.href="cadMensagem.php";
           }
           
           function editar(idMensagem){
             window.location.href="cadMensagem.php?idMensagem="+idMensagem;  
             
           }
           
           function selecionar(idMensagem){
             window.location.href="selecionaMensagem.php?idMensagem="+idMensagem;  
             
           }
           
           function enviar(){
               $("#formMensagem").submit();

           }
           
           function excluir(idMensagem){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirMensagem.php?idMensagem="+idMensagem;
               }else{
                   return false;
               }
           
           }
        </script>
                    
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalMensagens'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">           
                    <?php if ($this->_tpl_vars['ret'] == 'se'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> A Mensagem foi Excluida com Sucesso!</span>
                    <?php endif; ?>
       
                    <?php if ($this->_tpl_vars['ret'] == 'ee'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel excluir. </span>
                    <?php endif; ?>                           
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Gerenciar Mensagens</legend>
                        <form class="well form-search" name="formMensagem" id="formMensagem" method="POST" action="listaMensagens.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <div>                                  
                                            <label for="destinatario" class="control-label" style="font-size:13px;">Autor:</label>
                                            <select id="destinatario" name="destinatario" class="arrendondaInputSelect">
                                                <option value="">::Selecione Lista::</option>
                                                <?php $_from = $this->_tpl_vars['clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cliente']):
?>
                                                    <option value="<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
" <?php if ($this->_tpl_vars['cliente']->getCli_ID() == $this->_tpl_vars['destinatario']): ?> selected='selected' <?php endif; ?> >
                                                        <?php echo $this->_tpl_vars['cliente']->getCli_nome(); ?>

                                                    </option>                                                
                                                 <?php endforeach; endif; unset($_from); ?>   
                                            </select>
                                            <label for="tituloMensagem" class="control-label" style="font-size:13px;">Título:</label>
                                            <input type="text" id="tituloMensagem" name="tituloMensagem" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['tituloMensagem']; ?>
">
                                        </div>                                        
                                        <div> 
                                            <br/>   
                                            <label>Mensagem</label>
                                            <textarea class="input-xlarge arrendondaInputSelect" id="mensagem" name="mensagem" rows="3"><?php echo $this->_tpl_vars['mensagem']; ?>
</textarea><br/>
                                        </div>  
                                            <br/>         
                                            <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                </div>
                           </form>
                    </fieldset>       
                    <button onclick="return abreNovo();" class="btn btn-info">Nova Mensagem</button>
                    <br/><br/>      
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Título</th>                                         
                                  <th>Mensagem</th>     
                                  <th class=tdBotao>Selecionar</th>                              
                                  <th class=tdBotao>Editar</th>
                                  <th class=tdBotao>Excluir</th>
                              </tr> 
                              
                              <?php $_from = $this->_tpl_vars['mensagens']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mensagem']):
?>
                                                            
                              <tr>
                                  <td><?php echo $this->_tpl_vars['mensagem']->getMens_Titulo(); ?>
</td>                                  
                                  <td><?php echo $this->_tpl_vars['mensagem']->getMens_Texto(); ?>
</td>                                                                                        
                                  <td><a href="#" rel="tooltip" onclick="return selecionar('<?php echo $this->_tpl_vars['mensagem']->getMens_ID(); ?>
');"  title="Clique para Editar esta Mensagem"><i class="icon-envelope"></i></a></td>                                  
                                  <td><a href="#" rel="tooltip" onclick="return editar('<?php echo $this->_tpl_vars['mensagem']->getMens_ID(); ?>
');"  title="Clique para Editar esta Mensagem"><i class="icon-edit"></i></a></td>                                  
                                  <td><a href="#" rel="tooltip" onclick="return excluir('<?php echo $this->_tpl_vars['mensagem']->getMens_ID(); ?>
');" title="Clique para Excluir esta Mensagem"><i class="icon-trash"></i></a></td>
                              </tr>
                              
                              <?php endforeach; endif; unset($_from); ?>
                              
                          </table>
                    </div>                    
           </div>
        </div>   
    </body>
</html>