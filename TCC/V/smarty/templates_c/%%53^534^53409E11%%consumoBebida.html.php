<?php /* Smarty version 2.6.26, created on 2012-11-14 02:48:42
         compiled from consumoBebida.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Consumo Bebidas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap.js"></script>     
        
        <script type="text/javascript" >

            $(function(){
                $("[rel=tooltip]").tooltip();
            });                    
                                 
           function enviar(){
               $("#formConsumoBebida").submit();

           }
                      
        </script>
                    
    </head>
    '; ?>

    <body>
        <div id="conteudo"  style='height:100%;' >
            <div class="container1">                                                               
                    <fieldset id="tabelaGrafico">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Gerar Gráfico de Consumo</legend>
                        <form class="well form-search" name="formConsumoBebida" id="formConsumoBebida" method="POST" target="_blank" action="imprimeGrafico.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <div>                                  
                                            <label for="bebida" class="control-label" style="font-size:13px;">Bebida:</label>
                                            <select id="bebida" name="bebida" class="arrendondaInputSelect">
                                                <option value="">::Selecione Lista::</option>
                                                <?php $_from = $this->_tpl_vars['bebidas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bebida']):
?>
                                                    <option value="<?php echo $this->_tpl_vars['bebida']->getPro_ID(); ?>
" <?php if ($this->_tpl_vars['bebida']->getPro_ID() == $this->_tpl_vars['bebida']): ?> selected='selected' <?php endif; ?> >
                                                        <?php echo $this->_tpl_vars['bebida']->getPro_Nome(); ?>

                                                    </option>                                                
                                                 <?php endforeach; endif; unset($_from); ?>   
                                            </select>                                            
                                        </div>                                        
                                            <br/>         
                                            <button type="submit" onclick="enviar();" class="btn">Gerar</button>
                                            
                                    </div>
                                </div>
                           </form>
                    </fieldset>                           
           </div>
        </div>   
    </body>
</html>