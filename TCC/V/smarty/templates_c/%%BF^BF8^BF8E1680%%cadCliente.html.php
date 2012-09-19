<?php /* Smarty version 2.6.26, created on 2012-09-18 18:51:13
         compiled from cadCliente.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>       
<html>
    <?php echo '
    <head>
        <title>Cliente</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.js"></script>
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.maskedinput.js"></script>
                
        <script type="text/javascript">
            $(function(){
                $("#dtNasc").mask("99/99/9999");
            });
            
            function abreListagem(){
                window.location.href="listaClientes.php";
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
                            <span> O Cliente foi Alterado com Sucesso!</span>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['ret'] == 'sc'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Cliente foi Cadastrado com Sucesso!</span>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['ret'] == 'ea'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel Alterar. Confira se ja existe um cliente com esses dados (Nome e Referencia).</span>
                    <?php endif; ?>                     
                    <?php if ($this->_tpl_vars['ret'] == 'ec'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel Cadastrar. Confira se ja existe um cliente com esses dados (Nome e Referencia).</span>
                    <?php endif; ?>                                           
                <fieldset id="tabelaCadastro">
                    <legend id="textoNavegacao">&nbsp;&nbsp;Cliente :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                    <form class="well form-inline" name="formCliente" id="formCliente" method="POST" action="salvaCliente.php">
                        <div class="control-group">
                            <input type="hidden" name="Save" id="Save" value="<?php echo $this->_tpl_vars['Save']; ?>
" />
                            <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $this->_tpl_vars['cliente']->getCli_id(); ?>
" />
                            
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="nomeCliente" class="control-label" style="font-size:13px;">Nome:</label>
                                <input type="text" id="nomeCliente" name="nomeCliente" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['cliente']->getCli_nome(); ?>
">      
 
                                <label for="referenciaCliente" class="control-label" style="font-size:13px;">Referência:</label>
                                <input type="text" id="referenciaCliente" name="referenciaCliente" class="input-xlarge arrendondaInputSelect" placeholder="Como lembrar do cliente..." value="<?php echo $this->_tpl_vars['cliente']->getCli_referencia(); ?>
"> 
                            </div> 
                                                        
                            <div class="controls" style="margin-bottom:10px;">                                 
                                <label for="dtNasc" class="control-label" style="font-size:13px;">Data Nascimento:</label>
                                <input type="text" id="dtNasc" name="dtNasc" class="input-small arrendondaInputSelect" value="<?php echo $this->_tpl_vars['cliente']->getCli_dtNasc(); ?>
">

                                <label for="apelido" class="control-label" style="font-size:13px;">Apelido:</label>
                                <input type="text" id="apelido" name="apelido"  class="input-medium arrendondaInputSelect" value="<?php echo $this->_tpl_vars['cliente']->getCli_apelido(); ?>
" />
                                                                                
                                <br/><br/>
                                <label for="email" class="control-label" style="font-size:13px;">Email:</label>
                                <input type="text" name="email" id="email" class="input-xxlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['cliente']->getCli_email(); ?>
" />
                                                                                
                                <br/><br/> 
                                <label for="estCivil" class="control-label" style="font-size:13px;">Relacionamento:</label>
                                <select id="estCivil" name="estCivil" class="arrendondaInputSelect">
                                   <option value=""></option>
                                   <option value="1" <?php if ($this->_tpl_vars['cliente']->getCli_estCivil() == 1): ?> selected='selected' <?php endif; ?> >Solteiro</option> 
                                   <option value="2" <?php if ($this->_tpl_vars['cliente']->getCli_estCivil() == 2): ?> selected='selected' <?php endif; ?> >Casado/União Estável</option>
                                   <option value="3" <?php if ($this->_tpl_vars['cliente']->getCli_estCivil() == 3): ?> selected='selected' <?php endif; ?> >Divorciado</option>
                                   <option value="4" <?php if ($this->_tpl_vars['cliente']->getCli_estCivil() == 4): ?> selected='selected' <?php endif; ?> >Namorando</option>
                                   <option value="5" <?php if ($this->_tpl_vars['cliente']->getCli_estCivil() == 5): ?> selected='selected' <?php endif; ?> >Viúvo</option>
                                </select>
                                
                                <label for="idIndicador" class="control-label" style="font-size:13px;">Indicador:</label>
                                <select id="idIndicador" name="idIndicador" class="arrendondaInputSelect" >
                                   <option value=""></option>
                                    <?php $_from = $this->_tpl_vars['indicadores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['indicador']):
?>
                                    <option value="<?php echo $this->_tpl_vars['indicador']->getCli_id(); ?>
" <?php if ($this->_tpl_vars['indicador']->getCli_id() == $this->_tpl_vars['cliente']->getCli_id_indicador()): ?> selected='selected' <?php endif; ?> >
                                    <?php echo $this->_tpl_vars['indicador']->getCli_nome(); ?>
 -- <?php echo $this->_tpl_vars['indicador']->getCli_referencia(); ?>
  
                                    </option> 
                                    <?php endforeach; endif; unset($_from); ?>
                                </select> 

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