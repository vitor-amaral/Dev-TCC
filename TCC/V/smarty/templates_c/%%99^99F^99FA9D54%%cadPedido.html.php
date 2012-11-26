<?php /* Smarty version 2.6.26, created on 2012-11-26 21:44:04
         compiled from cadPedido.html */ ?>
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
        
        <script type="text/javascript">
            function abreListagem(){
                window.location.href="listaPedidos.php";
            }
            
            $(function(){
                $("[rel=tooltip]").tooltip();
                $("#dataPedido").mask("99/99/9999");                 
            });
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo">
            <div class="container1">
                <div class="asdf">
                    <?php if ($this->_tpl_vars['ret'] == 'sa'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O pedido foi Alterado com Sucesso!</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 'sc'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span>O pedido foi Cadastrado com Sucesso!</span>
                     <?php endif; ?>
                    <?php if ($this->_tpl_vars['ret'] == 'ea'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel Alterar.</span>
                    <?php endif; ?>                     
                    <?php if ($this->_tpl_vars['ret'] == 'ec'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel Cadastrar. </span>
                    <?php endif; ?>                     
                <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Gerenciar Pedidos</legend>
                        <form class="well form-search" name="formPedido" id="formPedido" method="POST" action="salvaPedido.php">
                                <div class="control-group">
                                    <input type="hidden" name="Save" id="Save" value="<?php echo $this->_tpl_vars['Save']; ?>
" />
                                    <input type="hidden" name="idPedido" id="idPedido" value="<?php echo $this->_tpl_vars['pedido']->getPed_ID(); ?>
" />
                                    <div class="controls" style="margin-bottom:10px;">
                                        <div>                                  
                                            <label for="autorPedido" class="control-label" style="font-size:13px;">Cliente(*):</label>
                                            <select id="autorPedido" name="autorPedido" class="arrendondaInputSelect">
                                                <option value="">::Selecione Lista::</option>
                                                <?php $_from = $this->_tpl_vars['clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cliente']):
?>
                                                    <option value="<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
" <?php if ($this->_tpl_vars['cliente']->getCli_ID() == $this->_tpl_vars['pedido']->getCli_ID()): ?> selected='selected' <?php endif; ?> >
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
" <?php if ($this->_tpl_vars['alimento']->getPro_ID() == $this->_tpl_vars['pedido']->getPro_ID()): ?> selected='selected' <?php endif; ?> >
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
" <?php if ($this->_tpl_vars['bebida']->getPro_ID() == $this->_tpl_vars['pedido']->getPro_ID()): ?> selected='selected' <?php endif; ?> >
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
" <?php if ($this->_tpl_vars['outro']->getPro_ID() == $this->_tpl_vars['pedido']->getPro_ID()): ?> selected='selected' <?php endif; ?> >
                                                        <?php echo $this->_tpl_vars['outro']->getPro_nome(); ?>

                                                    </option>                                                
                                                 <?php endforeach; endif; unset($_from); ?>   
                                            </select> 
                                            <br/><br/>                                         
                                        </div>       
                                        <div>
                                            <label for="qtdeProduto" class="control-label" style="font-size:13px;">Quantidade(*):</label>
                                            <input type="text" id="qtdeProduto" name="qtdeProduto" class="input-small arrendondaInputSelect" value="<?php echo $this->_tpl_vars['pedido']->getPro_Qtde(); ?>
">
                                            <label for="dataPedido" class="control-label" style="font-size:13px;">Data(*):</label>
                                            <input type="text" id="dataPedido" name="dataPedido" class="input-small arrendondaInputSelect" value="<?php echo $this->_tpl_vars['pedido']->getPed_Data(); ?>
">
                                        </div>
                                        <div> 
                                            <br/>   
                                            <label for="comentPedido" class="control-label" style="font-size:13px;">Comentário:</label>
                                            <textarea class="input-xlarge arrendondaInputSelect" id="comentPedido" name="comentPedido" rows="3"><?php echo $this->_tpl_vars['pedido']->getPed_Coment(); ?>
</textarea><br/>
                                        </div>                                              
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit"><?php echo $this->_tpl_vars['nomeBotao']; ?>
</button>     
                                </div><br/>                                
                           </form>
                           <button class="btn" onclick="return abreListagem();">Voltar para Listagem</button>
                    </fieldset>                              
                </div>
            </div>
        </div>
    </body>
</html>