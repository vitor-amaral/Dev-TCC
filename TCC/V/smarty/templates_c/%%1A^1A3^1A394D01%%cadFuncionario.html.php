<?php /* Smarty version 2.6.26, created on 2012-09-06 03:40:26
         compiled from cadFuncionario.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>       
<html>
    <?php echo '
    <head>
        <title>Funcionario</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript">
            function abreListagem(){
                window.location.href="listaFuncionarios.php";
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
                            <span> O Funcionario foi Alterado com Sucesso!</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 's'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Funcionario foi Cadastrado com Sucesso!</span>
                     <?php endif; ?>
                <fieldset id="tabelaCadastro">
                    <legend id="textoNavegacao">&nbsp;&nbsp;Funcionario :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                    <form class="well form-inline" name="formFuncionario" id="formFuncionario" method="POST" action="salvaFuncionario.php">
                        <div class="control-group">
                            <input type="hidden" name="Save" id="Save" value="<?php echo $this->_tpl_vars['Save']; ?>
" />
                            <input type="hidden" name="idFuncionario" id="idFuncionario" value="<?php echo $this->_tpl_vars['funcionario']->getFuncionario_ID(); ?>
" />
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="nomeFuncionario" class="control-label" style="font-size:13px;">Nome:</label>
                                <input type="text" id="nomeFuncionario" name="nomeFuncionario" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['funcionario']->getFuncionario_Nome(); ?>
">
                           
                                <label for="matriculaFuncionario" class="control-label" style="font-size:13px;">Matricula:</label>
                                <input type="text" id="matriculaFuncionario" name="matriculaFuncionario" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['funcionario']->getFuncionario_Matricula(); ?>
">                            
                            </div>
                            <div class="controls" style="margin-bottom:10px;">   
                                <label for="idcargo" class="control-label" style="font-size:13px;">Cargo:</label>
                                <select id="idcargo" name="idcargo" class="arrendondaInputSelect">
                                   <option value=""></option>
                                    <?php $_from = $this->_tpl_vars['cargos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cargo']):
?>
                                    <option value="<?php echo $this->_tpl_vars['cargo']->getCargo_ID(); ?>
" <?php if ($this->_tpl_vars['cargo']->getCargo_ID() == $this->_tpl_vars['funcionario']->getCargo_ID()): ?> selected='selected' <?php endif; ?> ><?php echo $this->_tpl_vars['cargo']->getCargo_Descricao(); ?>
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