<?php /* Smarty version 2.6.26, created on 2012-08-26 22:53:45
         compiled from listaVaras.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Varas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript" >
           function abreNovaVara(){
               window.location.href="cadVara.php";
           }
           
           function enviar(){
               $("#formVara").submit();
           }
           
           function excluirVara(idVara){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirVara.php?idVara="+idVara;
               }else{
                   return false;
               }
           
           }
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalVaras'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Varas :: Listagem</legend>
                        <form class="well form-search" name="formVara" id="formVara" method="POST" action="listaVaras.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="nomeVara" class="control-label" style="font-size:13px;">Nome:</label>
                                        <input type="text" id="nomeVara" name="nomeVara" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['nomeVara']; ?>
">                                   
                                        
                                        
                                        <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                </div>
                           </form>
                    </fieldset>
                    <button onclick="return abreNovaVara();" class="btn">Nova Vara</button>
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Nome Vara</th>
                                  <th>Editar</th>
                                  <th>Excluir</th>
                              </tr> 
                              
                              <?php $_from = $this->_tpl_vars['varas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['vara']):
?>
                              
                              <tr>
                                  <td><?php echo $this->_tpl_vars['vara']->getNomeVara(); ?>
</td>                                  
                                  <td>
                                      <a href="cadVara.php?idVara=<?php echo $this->_tpl_vars['vara']->getIdVara(); ?>
" alt="Clique para Editar esta vara">
                                          <i class="icon-edit"></i>
                                      </a>
                                  </td>
                                  <td>
                                      <a href="#" onclick="return excluirVara('<?php echo $this->_tpl_vars['vara']->getIdVara(); ?>
');" alt="Clique para Excluir esta vara">
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