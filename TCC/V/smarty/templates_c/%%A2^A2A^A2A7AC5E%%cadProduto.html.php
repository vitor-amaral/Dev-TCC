<?php /* Smarty version 2.6.26, created on 2012-11-10 22:58:28
         compiled from cadProduto.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Produtos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap.js"></script>     
        
        <script type="text/javascript" >

            $(function(){
                $("[rel=tooltip]").tooltip();
            });
                    
           function abreListagem(){
                window.location.href="listaProdutos.php";
            }
        </script>
                    
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalProdutos'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">   
                    <?php if ($this->_tpl_vars['ret'] == 'sa'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O produto foi Alterado com Sucesso!</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 'sc'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span>O produto foi Cadastrado com Sucesso!</span>
                     <?php endif; ?>
                    <?php if ($this->_tpl_vars['ret'] == 'ea'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel Alterar.</span>
                    <?php endif; ?>                     
                    <?php if ($this->_tpl_vars['ret'] == 'ec'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel Cadastrar. </span>
                    <?php endif; ?></legend>
                        <form class="well form-search" name="formProduto" id="formProduto" method="POST" action="salvaProduto.php">
                                <div class="control-group">
                                    <input type="hidden" name="Save" id="Save" value="<?php echo $this->_tpl_vars['Save']; ?>
" />     
                                    <input type="hidden" name="idProduto" id="idProduto" value="<?php echo $this->_tpl_vars['produto']->getPro_ID(); ?>
" />
                                    <div>
                                        <label for="nomeProduto" class="control-label" style="font-size:13px;">Produto:</label>
                                        <input type="text" id="nomeProduto" name="nomeProduto" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['produto']->getPro_Nome(); ?>
">

                                        <label for="precoProduto" class="control-label" style="font-size:13px;margin-left:10px;">Preço:</label>
                                        <div class="input-prepend input-append">
                                            <span class="add-on arrendondaInputSelect">R$</span>
                                            <input id="precoProduto" name="precoProduto" class="input-small arrendondaInputSelect" type="text" size="16" value="<?php echo $this->_tpl_vars['produto']->getPro_Preco(); ?>
">            
                                        </div>  
                                    </div>
                                    <div>
                                        <br/>    
                                        <label for="tipoProduto" class="control-label" style="font-size:13px;">Tipo de Produto:</label>
                                        <select id="tipoProduto" name="tipoProduto" class="arrendondaInputSelect">
                                            <option value="">::Selecione::</option>                                                                                                
                                                <option value="1" <?php if ($this->_tpl_vars['produto']->getPro_Tipo() == 1): ?> selected='selected' <?php endif; ?> >Alimento</option> 
                                                <option value="2" <?php if ($this->_tpl_vars['produto']->getPro_Tipo() == 2): ?> selected='selected' <?php endif; ?>  >Bebida</option> 
                                                <option value="3" <?php if ($this->_tpl_vars['produto']->getPro_Tipo() == 3): ?> selected='selected' <?php endif; ?>  >Outros</option>                                                                                                  
                                        </select>
                                    </div>
                                    <br/>                                        
                                </div>                               
                                <button class="btn btn-primary" type="submit"><?php echo $this->_tpl_vars['nomeBotao']; ?>
</button>     
                            
                        </form>
                        <button class="btn" onclick="return abreListagem();">Voltar para Listagem</button>
                    </fieldset>                                 
           </div>
        </div>   
    </body>
</html>