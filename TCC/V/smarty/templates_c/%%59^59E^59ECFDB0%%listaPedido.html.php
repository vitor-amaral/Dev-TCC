<?php /* Smarty version 2.6.26, created on 2012-11-26 20:54:13
         compiled from listaPedido.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Pedidos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap.js"></script>     
        
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap-collapse.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap-tooltip.js"></script>
                      
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.maskedinput.js"></script>
        
        <script type="text/javascript" >

            $(function(){
                $("[rel=tooltip]").tooltip();
                $("#dataPedido").mask("99/99/9999");                 
            });
                    
           function abreNovo(){
               window.location.href="cadPedido.php";
           }
           
           function editar(idPedido){
             window.location.href="cadPedido.php?idPedido="+idPedido;  
             
           }
           
           function enviar(){
               $("#formPedido").submit();

           }
           
           function excluir(idPedido){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirPedido.php?idPedido="+idPedido;
               }else{
                   return false;
               }
           
           }
        </script>
                    
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalPedidos'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">           
                    <?php if ($this->_tpl_vars['ret'] == 'se'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Pedido foi Excluído com Sucesso!</span>
                    <?php endif; ?>
       
                    <?php if ($this->_tpl_vars['ret'] == 'ee'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel excluir. </span>
                    <?php endif; ?>                           
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Gerenciar Pedidos</legend>
                        <form class="well form-search" name="formPedido" id="formPedido" method="POST" action="listaPedidos.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <div>                                  
                                            <label for="autorPedido" class="control-label" style="font-size:13px;">Cliente:</label>
                                            <select id="autorPedido" name="autorPedido" class="arrendondaInputSelect">
                                                <option value="">::Selecione Lista::</option>
                                                <?php $_from = $this->_tpl_vars['clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cliente']):
?>
                                                    <option value="<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
" <?php if ($this->_tpl_vars['cliente']->getCli_ID() == $this->_tpl_vars['autorPedido']): ?> selected='selected' <?php endif; ?> >
                                                        <?php echo $this->_tpl_vars['cliente']->getCli_nome(); ?>

                                                    </option>                                                
                                                 <?php endforeach; endif; unset($_from); ?>   
                                            </select> 
                                            <br/><br/>
                                        </div>
                                        <div>
                                            <label for="nomeAlimento" class="control-label" style="font-size:13px;">Alimentos:</label>
                                            <select id="nomeAlimento" name="nomeAlimento" class="arrendondaInputSelect">
                                                <option value="">::Selecione Lista::</option>
                                                <?php $_from = $this->_tpl_vars['alimentos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['alimento']):
?>
                                                    <option value="<?php echo $this->_tpl_vars['alimento']->getPro_ID(); ?>
" <?php if ($this->_tpl_vars['alimento']->getPro_ID() == $this->_tpl_vars['nomeAlimento']): ?> selected='selected' <?php endif; ?> >
                                                        <?php echo $this->_tpl_vars['alimento']->getPro_nome(); ?>

                                                    </option>                                                
                                                 <?php endforeach; endif; unset($_from); ?>   
                                            </select>
                                            <label for="nomeBebida" class="control-label" style="font-size:13px;">Bebidas:</label>
                                            <select id="nomeBebida" name="nomeBebida" class="arrendondaInputSelect">
                                                <option value="">::Selecione Lista::</option>
                                                <?php $_from = $this->_tpl_vars['bebidas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bebida']):
?>
                                                    <option value="<?php echo $this->_tpl_vars['bebida']->getPro_ID(); ?>
" <?php if ($this->_tpl_vars['bebida']->getPro_ID() == $this->_tpl_vars['nomeBebida']): ?> selected='selected' <?php endif; ?> >
                                                        <?php echo $this->_tpl_vars['bebida']->getPro_nome(); ?>

                                                    </option>                                                
                                                 <?php endforeach; endif; unset($_from); ?>   
                                            </select> 
                                            <label for="nomeOutros" class="control-label" style="font-size:13px;">Outros:</label>
                                            <select id="nomeOutros" name="nomeOutros" class="arrendondaInputSelect">
                                                <option value="">::Selecione Lista::</option>
                                                <?php $_from = $this->_tpl_vars['outros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['outro']):
?>
                                                    <option value="<?php echo $this->_tpl_vars['outro']->getPro_ID(); ?>
" <?php if ($this->_tpl_vars['outro']->getPro_ID() == $this->_tpl_vars['nomeOutros']): ?> selected='selected' <?php endif; ?> >
                                                        <?php echo $this->_tpl_vars['outro']->getPro_nome(); ?>

                                                    </option>                                                
                                                 <?php endforeach; endif; unset($_from); ?>   
                                            </select> 
                                            <br/><br/>                                         
                                        </div>       
                                        <div>
                                            <label for="qtdeProduto" class="control-label" style="font-size:13px;">Quantidade:</label>
                                            <input type="text" id="qtdeProduto" name="qtdeProduto" class="input-small arrendondaInputSelect" value="<?php echo $this->_tpl_vars['qtdeProduto']; ?>
">
                                            <label for="dataPedido" class="control-label" style="font-size:13px;">Data:</label>
                                            <input type="text" id="dataPedido" name="dataPedido" class="input-small arrendondaInputSelect" value="<?php echo $this->_tpl_vars['dataPedido']; ?>
">
                                        </div>                                 
                                        <div> 
                                            <br/>   
                                            <label>Comentário:</label>
                                            <textarea class="input-xlarge arrendondaInputSelect" id="comentPedido" name="comentPedido" rows="3"><?php echo $this->_tpl_vars['comentPedido']; ?>
</textarea><br/>
                                        </div>  
                                            <br/>         
                                            <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                </div>
                           </form>
                    </fieldset>       
                    <button onclick="return abreNovo();" class="btn btn-info">Novo Pedido</button>
                    <br/><br/>      
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Cliente</th>
                                  <th>Produto</th>         
                                  <th>Quantidade</th> 
                                  <th>Data</th>                                                               
                                  <th>Comentário</th>                                                               
                                  <th class=tdBotao>Editar</th>
                                  <th class=tdBotao>Excluir</th>
                              </tr> 
                              
                              <?php $_from = $this->_tpl_vars['pedidos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pedido']):
?>
                                                            
                              <tr>
                                  <td><?php echo $this->_tpl_vars['pedido']->getCli_Nome(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['pedido']->getPro_Nome(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['pedido']->getPro_Qtde(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['pedido']->getPed_Data(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['pedido']->getPed_Coment(); ?>
</td>                                                                  
                                  <td><a href="#" rel="tooltip" onclick="return editar('<?php echo $this->_tpl_vars['pedido']->getPed_id(); ?>
');"  title="Clique para Editar este Pedido"><i class="icon-edit"></i></a></td>                                  
                                  <td><a href="#" rel="tooltip" onclick="return excluir('<?php echo $this->_tpl_vars['pedido']->getPed_id(); ?>
');" title="Clique para Excluir este Pedido"><i class="icon-trash"></i></a></td>
                              </tr>
                              
                              <?php endforeach; endif; unset($_from); ?>
                              
                          </table>
                    </div>                    
           </div>
        </div>   
    </body>
</html>