<?php /* Smarty version 2.6.26, created on 2012-10-23 04:35:08
         compiled from cadEvento.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Eventos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.js"></script>
                             
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap-collapse.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap-tooltip.js"></script>
                      
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.maskedinput.js"></script>
        
        <script type="text/javascript" >

            $(function(){
                $("[rel=tooltip]").tooltip();
                $("#dtEvento").mask("99/99/9999");
                $("#hrEvento").mask("99:99:99");  
            });                              
           
           function abreListagem(){
                window.location.href="listaEventos.php";
            }
        </script>
        
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalEventos'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">  
                    <?php if ($this->_tpl_vars['ret'] == 'sa'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O evento foi Alterado com Sucesso!</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 'sc'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span>O evento foi Cadastrado com Sucesso!</span>
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
                        <legend id="textoNavegacao">&nbsp;&nbsp;Evento :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                        <form class="well form-search" name="formEvento" id="formEvento" method="POST" action="salvaEvento.php">
                                <div class="control-group">
                                    <input type="hidden" name="Save" id="Save" value="<?php echo $this->_tpl_vars['Save']; ?>
" />     
                                    <input type="hidden" name="idEvento" id="idEvento" value="<?php echo $this->_tpl_vars['evento']->getEv_ID(); ?>
" />
                                        <div class="controls" style="margin-bottom:10px;">  
                                            <label>Título</label> 
                                            <input type="text" class="input-xlarge arrendondaInputSelect" id="nomeEvento" name="nomeEvento" value="<?php echo $this->_tpl_vars['evento']->getEv_Nome(); ?>
"/>                    
                                            <label>Tema</label>
                                            <input type="text" class="input-xlarge arrendondaInputSelect" id="temaEvento" name="temaEvento" value="<?php echo $this->_tpl_vars['evento']->getEv_Tema(); ?>
"/>                    
                                        </div>
                                        <div class="controls" style="margin-bottom:10px;">     
                                            <label>Data Evento</label>
                                            <input type="text" class="input-small arrendondaInputSelect" id="dtEvento" name="dtEvento" value="<?php echo $this->_tpl_vars['evento']->getEv_Data(); ?>
"/>                                                                                    
                                        </div> 
                                        <div class="controls" style="margin-bottom:10px;">     
                                            <label>Hora Evento</label>
                                            <input type="text" class="input-small arrendondaInputSelect" id="hrEvento" name="hrEvento" value="<?php echo $this->_tpl_vars['evento']->getEv_Hora(); ?>
"/>                                                                                    
                                        </div>                                          
                                        <div class="controls" style="margin-bottom:10px;">     
                                            <label>Observação</label>
                                            <textarea class="input-xlarge arrendondaInputSelect" id="obsEvento" name="obsEvento" rows="3"><?php echo $this->_tpl_vars['evento']->getEv_Descricao(); ?>
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