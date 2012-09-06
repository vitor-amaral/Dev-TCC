<?php /* Smarty version 2.6.26, created on 2012-08-26 22:54:14
         compiled from listaProcessos.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>    
<html>
    <?php echo '
    <head>
        <title>Processo</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript" >
           function abreNovoProcesso(){
               window.location.href="cadProcesso.php";
           }
           
           function enviar(){
               $("#formProcesso").submit();
           }
           
           function excluirProcesso(idProcesso){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirProcesso.php?idProcesso="+idProcesso;
               }else{
                   return false;
               }
           
           }
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalProcessos'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Processo :: Listagem</legend>
                        <form class="well form-search" name="formProcesso" id="formProcesso" method="POST" action="listaProcessos.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="numeroProcesso" class="control-label" style="font-size:13px;">Nº Processo:</label>
                                        <input type="text" id="numeroProcesso" name="numeroProcesso" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['numeroProcesso']; ?>
">                                   
                                        
                                        
                                        <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                </div>
                           </form>
                    </fieldset>
                    <button onclick="return abreNovoProcesso();" class="btn">Novo Processo</button>
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Numero Processo</th>
                                  <th>Cliente</th>
                                  <th>Comarca</th>
                                  <th>Vara</th>
                                  <th>Editar</th>
                                  <th>Excluir</th>
                              </tr> 
                              
                              <?php $_from = $this->_tpl_vars['processos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['processo']):
?>
                              
                              <tr>
                                  <td><?php echo $this->_tpl_vars['processo']->getNumeroProcesso(); ?>
</td>
                                  <td>
                                      <?php if ($this->_tpl_vars['processo']->getCliente() == 'A'): ?>
                                        Autor
                                      <?php else: ?>
                                        Reú
                                      <?php endif; ?>
                                  </td>
                                  <td><?php echo $this->_tpl_vars['processo']->getNomeComarca(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['processo']->getNomeVara(); ?>
</td>
                                  <td>
                                      <a href="cadProcesso.php?idProcesso=<?php echo $this->_tpl_vars['processo']->getIdProcesso(); ?>
" alt="Clique para Editar este Processo">
                                          <i class="icon-edit"></i>
                                      </a>
                                  </td>
                                  <td>
                                      <a href="#" onclick="return excluirProcesso('<?php echo $this->_tpl_vars['processo']->getIdProcesso(); ?>
');" alt="Clique para Excluir este Processo">
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