<?php /* Smarty version 2.6.26, created on 2012-08-26 22:54:10
         compiled from cadBanco.html */ ?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <?php echo '
    <head>
        <title>Banco</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript">
            function abreListagem(){
                window.location.href="listaBancos.php";
            }
        </script>
    </head>
    '; ?>

    <body>
        <div id="menu">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
        </div>
        <div id="conteudo">
            <div class="container1">
                <div class="asdf">
                    <?php if ($this->_tpl_vars['ret'] == 'sa'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Banco foi Alterado com Sucesso</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 's'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span>O Banco foi Cadastrado com Sucesso</span>
                     <?php endif; ?>
                <fieldset id="tabelaCadastro">
                    <legend id="textoNavegacao">&nbsp;&nbsp;Banco :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                    <form class="well form-inline" name="formBanco" id="formBanco" method="POST" action="salvaBanco.php">
                        <div class="control-group">
                            <input type="hidden" name="bancoSave" id="advogadoSave" value="<?php echo $this->_tpl_vars['bancoSave']; ?>
" />
                            <input type="hidden" name="idBanco" id="idBanco" value="<?php echo $this->_tpl_vars['banco']->getCodBanco(); ?>
" />
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="nomeBanco" class="control-label" style="font-size:13px;">Nome Banco:</label>
                                <input type="text" id="nomeBanco" name="nomeBanco" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['banco']->getNomeBanco(); ?>
">
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