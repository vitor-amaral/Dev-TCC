<?php /* Smarty version 2.6.26, created on 2012-09-03 03:15:35
         compiled from listaCidade.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Cidades</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript" >
           function abreNovaCidade(){
               window.location.href="cadCidade.php";
           }
           
           function editarCidade(idCidade){
             window.location.href="cadCidade.php?idCidade="+idCidade;  
           }
           
           function enviar(){
               $("#formCidade").submit();

           }
           
           function excluirCidade(idCidade){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirCidade.php?idCidade="+idCidade;
               }else{
                   return false;
               }
           
           }
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalCidades'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Cidades :: Listagem</legend>
                        <form class="well form-search" name="formCidade" id="formCidade" method="POST" action="listaCidades.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="nomeCidade" class="control-label" style="font-size:13px;">Cidade:</label>
                                        <input type="text" id="nomeCidade" name="nomeCidade" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['nomeCidade']; ?>
">      
 
                                    <div>    
                                        <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                    </div>
                                </div>
                           </form>
                    </fieldset>
                    <button onclick="return abreNovaCidade();" class="btn">Nova Cidade</button>
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Cidade</th>
                                  <th class=tdBotao>Editar</th>
                                  <th class=tdBotao>Excluir</th>
                              </tr> 
                              
                              <?php $_from = $this->_tpl_vars['cidades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cidade']):
?>
                              
                              <tr>
                                  <td><?php echo $this->_tpl_vars['cidade']->getCidade_Nome(); ?>
</td>
                                  <td>
                                    <a href="#" onclick="return editarCidade(<?php echo $this->_tpl_vars['cidade']->getCidade_ID(); ?>
);"  alt="Clique para Editar esta Cidade"> 
                                      <!--<a href="cadCidade.php?idCidade=<?php echo $this->_tpl_vars['cidade']->getCidade_ID(); ?>
" alt="Clique para Editar esta Cidade">     -->                                       
                                          <i class="icon-edit"></i>
                                      </a>
                                  </td>
                                  <td>
                                      <a href="#" onclick="return excluirCidade('<?php echo $this->_tpl_vars['cidade']->getCidade_ID(); ?>
');" alt="Clique para Excluir esta Cidade">
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