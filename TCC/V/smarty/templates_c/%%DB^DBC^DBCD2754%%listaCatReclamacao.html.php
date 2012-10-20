<?php /* Smarty version 2.6.26, created on 2012-10-20 18:17:44
         compiled from listaCatReclamacao.html */ ?>
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
        
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap.js"></script>
        
        <script type="text/javascript" >

            $(function(){
                $("[rel=tooltip]").tooltip();
            });
                    
           function abreNovaCategoria(){
               window.location.href="cadCatReclamacao.php";
           }
           
           function editarCatReclamacao(idCatReclamacao){
             window.location.href="cadCatReclamacao.php?idCatReclamacao="+idCatReclamacao;  
           }
           
           function enviar(){
               $("#formCategoria").submit();

           }
           
           function excluirCatReclamacao(idCatReclamacao){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirCatReclamacao.php?idCatReclamacao="+idCatReclamacao;
               }else{
                   return false;
               }
           
           }
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalCategorias'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">
                    <?php if ($this->_tpl_vars['ret'] == 'se'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> A Categoria foi Excluida com Sucesso!</span>
                    <?php endif; ?>
       
                    <?php if ($this->_tpl_vars['ret'] == 'ee'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel excluir.</span>
                    <?php endif; ?>              
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Categorias :: Listagem</legend>
                        <form class="well form-search" name="formCategoria" id="formCategoria" method="POST" action="listaCatReclamacao.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="catReclamacao" class="control-label" style="font-size:13px;">Categoria:</label>
                                        <input type="text" id="catReclamacao" name="catReclamacao" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['descricao']; ?>
">                                              
                                    <div>    
                                        <br/>
                                        <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                    </div>
                                </div>
                           </form>
                    </fieldset>
                    <button onclick="return abreNovaCategoria();" class="btn btn-info">Nova Categoria</button>
                    
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Categoria</th>
                                  <th class=tdBotao>Editar</th>
                                  <th class=tdBotao>Excluir</th>
                              </tr> 
                              
                              <?php $_from = $this->_tpl_vars['categorias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['categoria']):
?>
                              
                              <tr>
                                  <td><?php echo $this->_tpl_vars['categoria']->getCatReclamacao_Desc(); ?>
</td>
                                  <td>
                                    <a href="#" rel="tooltip" onclick="return editarCatReclamacao(<?php echo $this->_tpl_vars['categoria']->getCatReclamacao_ID(); ?>
);"  title="Clique para Editar esta Categoria">
                                          <i class="icon-edit"></i>
                                      </a>
                                  </td>
                                  <td>
                                      <a href="#" rel="tooltip" onclick="return excluirCatReclamacao('<?php echo $this->_tpl_vars['categoria']->getCatReclamacao_ID(); ?>
');" title="Clique para Excluir esta Categoria">
                                          <i class="icon-trash"></i>                                          
                                      </a>
                                  </td>
                              </tr>
                              
                              <?php endforeach; endif; unset($_from); ?>
                          </table>
                    </div>
            </div>
       </div>
    </body>
</html>