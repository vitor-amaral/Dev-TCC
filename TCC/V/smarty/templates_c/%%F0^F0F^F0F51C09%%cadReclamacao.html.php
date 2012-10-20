<?php /* Smarty version 2.6.26, created on 2012-10-20 18:18:42
         compiled from cadReclamacao.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>    
<html>
    <?php echo '
    <head>
        <title>Categorias</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript">
            function abreListagem(){
                window.location.href="listaReclamacoes.php";
            }
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo">
            <div class="container1">
                <div class="asdf">
                    <?php if ($this->_tpl_vars['ret'] == 'sa'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> A reclamação foi Alterada com Sucesso!</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 'sc'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span>A reclamção foi Cadastrada com Sucesso!</span>
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
                        <legend id="textoNavegacao">&nbsp;&nbsp;Gerenciar Reclamações/Sugestões</legend>
                        <form class="well form-search" name="formReclamacao" id="formReclamacao" method="POST" action="salvaReclamacao.php">
                                <div class="control-group">
                                    <input type="hidden" name="Save" id="Save" value="<?php echo $this->_tpl_vars['Save']; ?>
" />
                                    <input type="hidden" name="idReclamacao" id="idReclamacao" value="<?php echo $this->_tpl_vars['reclamacao']->getReclamacao_ID(); ?>
" />
                                    <div class="controls" style="margin-bottom:10px;">
                                        <div>                                  
                                            <label for="autorReclamacao" class="control-label" style="font-size:13px;">Autor:</label>
                                            <select id="autorReclamacao" name="autorReclamacao" class="arrendondaInputSelect">
                                                <option value="">::Selecione Lista::</option>
                                                <?php $_from = $this->_tpl_vars['clientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cliente']):
?>
                                                    <option value="<?php echo $this->_tpl_vars['cliente']->getCli_ID(); ?>
" <?php if ($this->_tpl_vars['cliente']->getCli_ID() == $this->_tpl_vars['reclamacao']->getCliente_id()): ?> selected='selected' <?php endif; ?> >
                                                        <?php echo $this->_tpl_vars['cliente']->getCli_nome(); ?>

                                                    </option>                                                
                                                 <?php endforeach; endif; unset($_from); ?>   
                                            </select>
                                            <label for="tituloReclamacao" class="control-label" style="font-size:13px;">Título:</label>
                                            <input type="text" id="tituloReclamacao" name="tituloReclamacao" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['reclamacao']->getReclamacao_titulo(); ?>
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
" <?php if ($this->_tpl_vars['categoria']->getCatReclamacao_ID() == $this->_tpl_vars['reclamacao']->getCategoria_id()): ?> selected='selected' <?php endif; ?> >
                                                        <?php echo $this->_tpl_vars['categoria']->getCatReclamacao_desc(); ?>

                                                    </option>                                                
                                                 <?php endforeach; endif; unset($_from); ?>                                                
                                            </select>                                            
                                            <label for="statusReclamacao" class="control-label" style="font-size:13px;">Status:</label>
                                            <select id="statusReclamacao" name="statusReclamacao" class="arrendondaInputSelect">
                                                <option value="">::Selecione::</option>                                                                                                
                                                    <option value="1" <?php if ($this->_tpl_vars['reclamacao']->getReclamacao_status() == 1): ?> selected='selected' <?php endif; ?> >Positiva</option> 
                                                    <option value="2" <?php if ($this->_tpl_vars['reclamacao']->getReclamacao_status() == 2): ?> selected='selected' <?php endif; ?>  >Negativa</option>                                                                                                   
                                            </select>                                                                
                                        </div>
                                        <div> 
                                            <br/>   
                                            <label>Descrição</label>
                                            <textarea class="input-xlarge arrendondaInputSelect" id="descReclamacao" name="descReclamacao" rows="3"><?php echo $this->_tpl_vars['reclamacao']->getReclamacao_desc(); ?>
</textarea><br/>
                                        </div>  
                                            
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit"><?php echo $this->_tpl_vars['nomeBotao']; ?>
</button>     
                                </div>
                           </form>                           
                           <button class="btn" onclick="return abreListagem();">Voltar para Listagem</button>
                    </fieldset>                                 
                </div>
            </div>
        </div>
    </body>
</html>