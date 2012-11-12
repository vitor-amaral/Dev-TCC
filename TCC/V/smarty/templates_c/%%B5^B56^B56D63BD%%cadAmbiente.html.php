<?php /* Smarty version 2.6.26, created on 2012-11-10 22:58:49
         compiled from cadAmbiente.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Ambientes</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.js"></script>
                             
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap-collapse.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap-tooltip.js"></script>
                      
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.maskedinput.js"></script>
        
        <script type="text/javascript" >            
           
           function abreListagem(){
                window.location.href="listaAmbientes.php";
            }
        </script>
        
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalAmbientes'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">  
                    <?php if ($this->_tpl_vars['ret'] == 'sa'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O ambiente foi Alterado com Sucesso!</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 'sc'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span>O ambiente foi Cadastrado com Sucesso!</span>
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
                        <legend id="textoNavegacao">&nbsp;&nbsp;Ambiente :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                        <form class="well form-search" name="formAmbiente" id="formAmbiente" method="POST" action="salvaAmbiente.php">
                                <div class="control-group">
                                    <input type="hidden" name="Save" id="Save" value="<?php echo $this->_tpl_vars['Save']; ?>
" />     
                                    <input type="hidden" name="idAmbiente" id="idAmbiente" value="<?php echo $this->_tpl_vars['ambiente']->getAmb_ID(); ?>
" />
                                        <div class="controls" style="margin-bottom:10px;">  
                                            <label for="nomeAmbiente" class="control-label" style="font-size:13px;">Ambiente:</label>  
                                            <input type="text" class="input-xlarge arrendondaInputSelect" id="nomeAmbiente" name="nomeAmbiente" value="<?php echo $this->_tpl_vars['ambiente']->getAmb_Nome(); ?>
"/>                                                                
                                        </div>                                        
                                        <div class="controls" style="margin-bottom:10px;">     
                                            <label for="descAmbiente" class="control-label" style="font-size:13px;">Descrição:</label>  
                                            <textarea class="input-xlarge arrendondaInputSelect" id="descAmbiente" name="descAmbiente" rows="3"><?php echo $this->_tpl_vars['ambiente']->getAmb_Descricao(); ?>
</textarea><br/>        
                                        </div>                                                                                    
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