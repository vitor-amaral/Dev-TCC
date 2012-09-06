<?php /* Smarty version 2.6.26, created on 2012-08-25 20:36:41
         compiled from listaComarcas.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Comarcas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript" >
           function abreNovaComarca(){
               window.location.href="cadComarca.php";
           }
           
           function enviar(){
               $("#formComarca").submit();
           }
           
           function excluirComarca(idComarca){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirComarca.php?idComarca="+idComarca;
               }else{
                   return false;
               }
           
           }
           
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalComarcas'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Comarcas :: Listagem</legend>
                        <form class="well form-search" name="formComarca" id="formComarca" method="POST" action="listaComarcas.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="nomeComarca" class="control-label" style="font-size:13px;">Nome:</label>
                                        <input type="text" id="nomeComarca" name="nomeComarca" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['nomeComarca']; ?>
">                                   
                                        
                                        
                                        <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                </div>
                           </form>
                    </fieldset>
                    <button onclick="return abreNovaComarca();" class="btn">Nova Comarca</button>
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Nome Comarca</th>
                                  <th>Editar</th>
                                  <th>Excluir</th>
                              </tr> 
                              
                              <?php $_from = $this->_tpl_vars['comarcas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comarca']):
?>
                              
                              <tr>
                                  <td><?php echo $this->_tpl_vars['comarca']->getNomeComarca(); ?>
</td>                                  
                                  <td>
                                      <a href="cadComarca.php?idComarca=<?php echo $this->_tpl_vars['comarca']->getIdComarca(); ?>
" alt="Clique para Editar esta comarca">
                                          <i class="icon-edit"></i>
                                      </a>
                                  </td>
                                  <td>
                                      <a href="#" onclick="return excluirComarca('<?php echo $this->_tpl_vars['comarca']->getIdComarca(); ?>
');" alt="Clique para Excluir esta comarca">
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