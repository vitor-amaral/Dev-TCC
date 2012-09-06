<?php /* Smarty version 2.6.26, created on 2012-08-26 22:47:54
         compiled from listaTipos.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Tipos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript" >
           function abreNovoTipo(){
               window.location.href="cadTipo.php";
           }
           
           function enviar(){
               $("#formTipo").submit();
           }
           
           function excluirTipo(idTipo){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirTipo.php?idTipo="+idTipo;
               }else{
                   return false;
               }
           
           }
           
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalTipos'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Tipos :: Listagem</legend>
                        <form class="well form-search" name="formTipo" id="formTipo" method="POST" action="listaTipos.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="nomeTipo" class="control-label" style="font-size:13px;">Nome:</label>
                                        <input type="text" id="nomeTipo" name="nomeTipo" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['nomeProcura']; ?>
">                                   
                                        
                                        <label for="tipoTela" class="control-label" style="font-size:13px;">Tela:</label>
                                        <select id="tipoTela" name="tipoTela" class="arrendondaInputSelect">
                                            <option value=""></option>
                                            <?php if ($this->_tpl_vars['tela'] == 1): ?>
                                            <option value="1" selected="selected" >Descrição</option>
                                            <option value="2">Pagamento</option>
                                            <?php else: ?>
                                                <?php if ($this->_tpl_vars['tela'] == 2): ?>
                                                <option value="1">Descrição</option>
                                                <option value="2" selected="selected" >Pagamento</option>
                                                <?php else: ?>
                                                <option value="1">Descrição</option>
                                                <option value="2" >Pagamento</option>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </select>
                                        
                                        <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                </div>
                           </form>
                    </fieldset>
                    <button onclick="return abreNovoTipo();" class="btn">Novo Tipo</button>
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Nome</th>
                                  <th>Tipo Tela</th>
                                  <th>Editar</th>
                                  <th>Excluir</th>
                              </tr> 
                              
                              <?php $_from = $this->_tpl_vars['tipos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tipo']):
?>
                              
                              <tr>
                                  <td><?php echo $this->_tpl_vars['tipo']->getNomeTipo(); ?>
</td>
                                  <?php if ($this->_tpl_vars['tipo']->getIdTela() == 1): ?>
                                  <td>Tela Descrição</td>
                                  <?php endif; ?>
                                  <?php if ($this->_tpl_vars['tipo']->getIdTela() == 2): ?>
                                  <td>Tela Pagamento</td>
                                  <?php endif; ?>
                                  <td>
                                      <a href="cadTipo.php?idTipo=<?php echo $this->_tpl_vars['tipo']->getIdTipo(); ?>
" alt="Clique para Editar este tipo">
                                          <i class="icon-edit"></i>
                                      </a>
                                  </td>
                                  <td>
                                      <a href="#" onclick="return excluirTipo('<?php echo $this->_tpl_vars['tipo']->getIdTipo(); ?>
');" alt="Clique para Excluir este tipo">
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