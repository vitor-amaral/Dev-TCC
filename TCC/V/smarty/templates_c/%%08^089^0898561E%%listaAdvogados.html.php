<?php /* Smarty version 2.6.26, created on 2012-08-26 22:50:59
         compiled from listaAdvogados.html */ ?>

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Advogados</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript" >
           function abreNovoAdvogado(){
               window.location.href="cadAdvogado.php";
           }
           
           function enviar(){
               $("#formAdvogado").submit();
           }
           
           function excluirAdvogado(idAdvogado){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirAdvogado.php?idAdvogado="+idAdvogado;
               }else{
                   return false;
               }
           
           }
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalAdvogados'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Advogado :: Listagem</legend>
                        <form class="well form-search" name="formAdvogado" id="formAdvogado" method="POST" action="listaAdvogados.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="nomeAdvogado" class="control-label" style="font-size:13px;">Nome:</label>
                                        <input type="text" id="nomeAdvogado" name="nomeAdvogado" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['nomeAdvogado']; ?>
">                                   
                                        
                                        
                                        <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                </div>
                           </form>
                    </fieldset>
                    <button onclick="return abreNovoAdvogado();" class="btn">Novo Advogado</button>
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Nome Advogado</th>
                                  <th>RG</th>
                                  <th>CPF</th>
                                  <th>Número OAB</th>
                                  <th>Editar</th>
                                  <th>Excluir</th>
                              </tr> 
                              
                              <?php $_from = $this->_tpl_vars['advogados']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['advogado']):
?>
                              
                              <tr>
                                  <td><?php echo $this->_tpl_vars['advogado']->getNome(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['advogado']->getRg(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['advogado']->getCpf(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['advogado']->getNumeroOab(); ?>
</td>
                                  <td>
                                      <a href="cadAdvogado.php?idAdvogado=<?php echo $this->_tpl_vars['advogado']->getId(); ?>
" alt="Clique para Editar este Advogado">
                                          <i class="icon-edit"></i>
                                      </a>
                                  </td>
                                  <td>
                                      <a href="#" onclick="return excluirAdvogado('<?php echo $this->_tpl_vars['advogado']->getId(); ?>
');" alt="Clique para Excluir este Advogado">
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