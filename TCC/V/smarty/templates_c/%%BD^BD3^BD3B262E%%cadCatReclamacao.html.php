<?php /* Smarty version 2.6.26, created on 2012-10-20 18:18:09
         compiled from cadCatReclamacao.html */ ?>
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
                window.location.href="listaCatReclamacao.php";
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
                            <span> A categoria foi Alterada com Sucesso!</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 'sc'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span>A categoria foi Cadastrada com Sucesso!</span>
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
                    <legend id="textoNavegacao">&nbsp;&nbsp;Categoria :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                    <form class="well form-inline" name="formCategoria" id="formCategoria" method="POST" action="salvaCatReclamacao.php">
                        <div class="control-group">
                            <input type="hidden" name="Save" id="Save" value="<?php echo $this->_tpl_vars['Save']; ?>
" />
                            <input type="hidden" name="idCatReclamacao" id="idCatReclamacao" value="<?php echo $this->_tpl_vars['catReclamacao']->getCatReclamacao_ID(); ?>
" />
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="catReclamcao" class="control-label" style="font-size:13px;">Categoria:</label>
                                <input type="text" id="catReclamacao" name="catReclamacao" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['catReclamacao']->getCatReclamacao_Desc(); ?>
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