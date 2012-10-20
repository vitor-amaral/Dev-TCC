<?php /* Smarty version 2.6.26, created on 2012-10-20 18:18:39
         compiled from listaReclamacao.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Reclamações/Sugestões</title>
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
               window.location.href="cadReclamacao.php";
           }
           
           function editar(idReclamacao){
             window.location.href="cadReclamacao.php?idReclamacao="+idReclamacao;  
             
           }
           
           function enviar(){
               $("#formReclamacao").submit();

           }
           
           function excluir(idReclamacao){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirReclamacao.php?idReclamacao="+idReclamacao;
               }else{
                   return false;
               }
           
           }
        </script>
                    
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalReclamacoes'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">           
                    <?php if ($this->_tpl_vars['ret'] == 'se'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> A Reclamação/Sugestão foi Excluida com Sucesso!</span>
                    <?php endif; ?>
       
                    <?php if ($this->_tpl_vars['ret'] == 'ee'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel excluir. </span>
                    <?php endif; ?>                           
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Gerenciar Reclamações/Sugestões</legend>
                        <form class="well form-search" name="formReclamacao" id="formReclamacao" method="POST" action="listaReclamacoes.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <div>                                  
                                            <label for="autorReclamacao" class="control-label" style="font-size:13px;">Autor:</label>
                                            <select id="autorReclamacao" name="autorReclamacao" class="arrendondaInputSelect">
                                                <option value="">::Selecione Lista::</option>
                                                <?php $_from = $this->_tpl_vars['clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cliente']):
?>
                                                    <option value="<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
" <?php if ($this->_tpl_vars['cliente']->getCli_ID() == $this->_tpl_vars['autorReclamacao']): ?> selected='selected' <?php endif; ?> >
                                                        <?php echo $this->_tpl_vars['cliente']->getCli_nome(); ?>

                                                    </option>                                                
                                                 <?php endforeach; endif; unset($_from); ?>   
                                            </select>
                                            <label for="tituloReclamacao" class="control-label" style="font-size:13px;">Título:</label>
                                            <input type="text" id="tituloReclamacao" name="tituloReclamacao" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['tituloReclamacao']; ?>
">
                                        </div>
                                        <div>
                                            <br/>     
                                            <label for="catReclamacao" class="control-label" style="font-size:13px;">Categoria:</label>
                                            <select id="catReclamacao" name="catReclamacao" class="arrendondaInputSelect">
                                                <option value="">::Selecione Lista::</option>
                                                <?php $_from = $this->_tpl_vars['categorias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['categoria']):
?>
                                                    <option value="<?php echo $this->_tpl_vars['categoria']->getCatReclamacao_ID(); ?>
" <?php if ($this->_tpl_vars['categoria']->getCatReclamacao_ID() == $this->_tpl_vars['catReclamacao']): ?> selected='selected' <?php endif; ?> >
                                                        <?php echo $this->_tpl_vars['categoria']->getCatReclamacao_desc(); ?>

                                                    </option>                                                
                                                 <?php endforeach; endif; unset($_from); ?>                                                
                                            </select>                                            
                                            <label for="statusReclamacao" class="control-label" style="font-size:13px;">Status:</label>
                                            <select id="statusReclamacao" name="statusReclamacao" class="arrendondaInputSelect">
                                                <option value="">::Selecione::</option>                                                                                                
                                                    <option value="1" <?php if ($this->_tpl_vars['statusReclamacao'] == 1): ?> selected='selected' <?php endif; ?> >Positiva</option> 
                                                    <option value="2" <?php if ($this->_tpl_vars['statusReclamacao'] == 2): ?> selected='selected' <?php endif; ?>  >Negativa</option>                                                                                                   
                                            </select>                                                                
                                        </div>
                                        <div> 
                                            <br/>   
                                            <label>Descrição</label>
                                            <textarea class="input-xlarge arrendondaInputSelect" id="descReclamacao" name="descReclamacao" rows="3"><?php echo $this->_tpl_vars['descReclamacao']; ?>
</textarea><br/>
                                        </div>  
                                            <br/>         
                                            <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                </div>
                           </form>
                    </fieldset>       
                    <button onclick="return abreNovo();" class="btn btn-info">Nova Reclamação</button>
                    <br/><br/>      
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Título</th>
                                  <th>Categoria</th>         
                                  <th>Descrição</th> 
                                  <th>Status</th>                                                               
                                  <th>Autor</th>                                                               
                                  <th class=tdBotao>Editar</th>
                                  <th class=tdBotao>Excluir</th>
                              </tr> 
                              
                              <?php $_from = $this->_tpl_vars['reclamacoes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reclamacao']):
?>
                                                            
                              <tr>
                                  <td><?php echo $this->_tpl_vars['reclamacao']->getReclamacao_titulo(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['reclamacao']->getCategoria_desc(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['reclamacao']->getReclamacao_desc(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['reclamacao']->getReclamacao_status_desc(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['reclamacao']->getCliente_nome(); ?>
</td>                                                                  
                                  <td><a href="#" rel="tooltip" onclick="return editar('<?php echo $this->_tpl_vars['reclamacao']->getReclamacao_id(); ?>
');"  title="Clique para Editar esta Reclamação/Sugestão"><i class="icon-edit"></i></a></td>                                  
                                  <td><a href="#" rel="tooltip" onclick="return excluir('<?php echo $this->_tpl_vars['reclamacao']->getReclamacao_id(); ?>
');" title="Clique para Excluir esta Reclamação/Sugestão"><i class="icon-trash"></i></a></td>
                              </tr>
                              
                              <?php endforeach; endif; unset($_from); ?>
                              
                          </table>
                    </div>                    
           </div>
        </div>   
    </body>
</html>