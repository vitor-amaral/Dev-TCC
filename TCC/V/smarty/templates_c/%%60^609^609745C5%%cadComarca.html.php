<?php /* Smarty version 2.6.26, created on 2012-08-25 20:36:58
         compiled from cadComarca.html */ ?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <?php echo '
    <head>
        <title>Comarca</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript">
            function abreListagem(){
                window.location.href="listaComarcas.php";
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
                            <span>A Comarca foi Alterada com Sucesso</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 's'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span>A Comarca foi Cadastrada com Sucesso</span>
                     <?php endif; ?>
                <fieldset id="tabelaCadastro">
                    <legend id="textoNavegacao">&nbsp;&nbsp;Comarca :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                    <form class="well form-inline" name="formComarca" id="formComarca" method="POST" action="salvaComarca.php">
                        <div class="control-group">
                            <input type="hidden" name="comarcaSave" id="comarcaSave" value="<?php echo $this->_tpl_vars['comarcaSave']; ?>
" />
                            <input type="hidden" name="idComarca" id="idComarca" value="<?php echo $this->_tpl_vars['comarca']->getIdComarca(); ?>
" />
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="nomeComarca" class="control-label" style="font-size:13px;">Nome Comarca:</label>
                                <input type="text" id="nomeComarca" name="nomeComarca" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['comarca']->getNomeComarca(); ?>
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