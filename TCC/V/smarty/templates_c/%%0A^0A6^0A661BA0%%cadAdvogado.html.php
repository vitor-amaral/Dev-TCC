<?php /* Smarty version 2.6.26, created on 2012-08-26 22:51:11
         compiled from cadAdvogado.html */ ?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <?php echo '
    <head>
        <title>Advogado</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript">
            function abreListagem(){
                window.location.href="listaAdvogados.php";
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
                            <span> O Advogado foi Alterado com Sucesso</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 's'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span>O Advogado foi Cadastrado com Sucesso</span>
                     <?php endif; ?>
                <fieldset id="tabelaCadastro">
                    <legend id="textoNavegacao">&nbsp;&nbsp;Advogado :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                    <form class="well form-inline" name="formComarca" id="formComarca" method="POST" action="salvaAdvogado.php">
                        <div class="control-group">
                            <input type="hidden" name="advogadoSave" id="advogadoSave" value="<?php echo $this->_tpl_vars['advogadoSave']; ?>
" />
                            <input type="hidden" name="idAdvogado" id="idAdvogado" value="<?php echo $this->_tpl_vars['advogado']->getId(); ?>
" />
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="nomeAdvogado" class="control-label" style="font-size:13px;">Nome Advogado:</label>
                                <input type="text" id="nomeAdvogado" name="nomeAdvogado" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['advogado']->getNome(); ?>
">
                            </div>
                            
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="rgAdvogado" class="control-label" style="font-size:13px;">RG:</label>
                                <input type="text" id="rgAdvogado" name="rgAdvogado" maxlength="9" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['advogado']->getRg(); ?>
">
                            </div> 
                            
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="cpfAdvogado" class="control-label" style="font-size:13px;">CPF:</label>
                                <input type="text" id="cpfAdvogado" name="cpfAdvogado" maxlength="9" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['advogado']->getCpf(); ?>
">
                            </div> 
                            
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="numeroOabAdvogado" class="control-label" style="font-size:13px;">Número OAB:</label>
                                <input type="text" id="numeroOabAdvogado" name="numeroOabAdvogado" maxlength="9" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['advogado']->getNumeroOab(); ?>
">
                            </div>
                            
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="orgaoEmissorAdvogado" class="control-label" style="font-size:13px;">Orgão Emissor:</label>
                                <input type="text" id="orgaoEmissorAdvogado" name="orgaoEmissorAdvogado" maxlength="9" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['advogado']->getOrgaoEmissor(); ?>
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