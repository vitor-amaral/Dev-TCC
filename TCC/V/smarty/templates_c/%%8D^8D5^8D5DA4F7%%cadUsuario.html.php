<?php /* Smarty version 2.6.26, created on 2012-09-13 01:29:11
         compiled from cadUsuario.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>       
<html>
    <?php echo '
    <head>
        <title>Usuario</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        <script type="text/javascript">
            function abreListagem(){
                window.location.href="listaUsuarios.php";
            }
            
           function testasenha(){
              
              if($("#confsenhaUsuario").val() == $("#novasenhaUsuario").val())
              {
                  $("#status").html("<i class=\\"icon-ok\\"></i>");
              }
              else
              {
                  $("#status").html("<i class=\\"icon-remove\\"></i>");
              }
           }
            
           function enviar(){
              
              if($("#confsenhaUsuario").val() == $("#novasenhaUsuario").val())
              {
                  $("#formUsuario").submit(); 
              }
              
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
                            <span> O Usuario foi Alterado com Sucesso!</span>
                     <?php endif; ?>
                     <?php if ($this->_tpl_vars['ret'] == 's'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Usuario foi Cadastrado com Sucesso!</span>
                     <?php endif; ?>
                <fieldset id="tabelaCadastro">
                    <legend id="textoNavegacao">&nbsp;&nbsp;Usuario :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                    <form class="well form-inline" name="formUsuario" id="formUsuario" method="POST" action ="salvaUsuario.php" >
                        <div class="control-group">
                            <input type="hidden" name="Save" id="Save" value="<?php echo $this->_tpl_vars['Save']; ?>
" />
                            <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $this->_tpl_vars['usuario']->getUsuario_ID(); ?>
" />
                            <div class="controls" style="margin-bottom:10px;">
                                <label for="loginUsuario" class="control-label" style="font-size:13px;">Login:</label>
                                <input type="text" id="loginUsuario" name="loginUsuario" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['usuario']->getUsuario_Login(); ?>
">
                           
                                <label for="idTipoAcesso" class="control-label" style="font-size:13px;">Tipo Acesso:</label>
                                <select id="idTipoAcesso" name="idTipoAcesso" class="arrendondaInputSelect">
                                   <option value=""></option>
                                    <?php $_from = $this->_tpl_vars['tipos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tipo']):
?>
                                    <option value="<?php echo $this->_tpl_vars['tipo']->getTipoAcesso_ID(); ?>
" <?php if ($this->_tpl_vars['tipo']->getTipoAcesso_ID() == $this->_tpl_vars['usuario']->getTipoAcesso_ID()): ?> selected='selected' <?php endif; ?> ><?php echo $this->_tpl_vars['tipo']->getTipoAcesso_Tipo(); ?>
</option> 
                                    <?php endforeach; endif; unset($_from); ?>
                                </select>                                
                            </div>
                            <div class="well" id="senha" style="border:1px;color:#4D9DA8;border-style:solid;">
                                <p><span class="label">Senha</span></p>
                                <div class="controls" style="margin-bottom:10px;">                            
                                    <?php if ($this->_tpl_vars['Save'] == 'a'): ?> 
                                        <label for="senhaUsuario" class="control-label" style="font-size:13px;">Senha:</label> 
                                        <input type="password" id="senhaUsuario" name="senhaUsuario" class="input-xlsmall arrendondaInputSelect" value="">                            
                                    <?php endif; ?>
                                </div>
                                <div class="controls" style="margin-bottom:10px;">  
                                   <label for="novasenhaUsuario" class="control-label" style="font-size:13px;">Nova Senha:</label> 
                                   <input type="password" id="novasenhaUsuario" name="novasenhaUsuario" onkeyup="testasenha()" class="input-xsmall arrendondaInputSelect" value="">
                                </div>
                                <div class="controls" style="margin-bottom:10px;"> 
                                   <label for="confsenhaUsuario" class="control-label" style="font-size:13px;">Confirmação:</label> 
                                   <input type="password" id="confsenhaUsuario" name="confsenhaUsuario" class="input-xsmall arrendondaInputSelect" onkeyup="testasenha()" value=""><SPAN id="status"></SPAN>
                                </div>
                            </div>
                            <!-- Filtro por funcionário -->
                            <div class="well" id="func" style="border:1px;color:#4D9DA8;border-style:solid;" >  
                                <p><span class="label">Funcionario</span></p> 
                                <!--                                
                                <label for="idFuncionario" class="control-label" style="font-size:13px;">Funcionario:</label>
                                <select id="idFuncionario" name="idFuncionario" class="arrendondaInputSelect">
                                   <option value=""></option>
                                    <?php $_from = $this->_tpl_vars['funcionarios']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['funcionario']):
?>
                                    <option value="<?php echo $this->_tpl_vars['funcionario']->getFuncionario_ID(); ?>
" <?php if ($this->_tpl_vars['funcionario']->getFuncionario_ID() == $this->_tpl_vars['usuario']->getFuncionario_ID()): ?> selected='selected' <?php endif; ?> ><?php echo $this->_tpl_vars['funcionario']->getFuncionario_Nome(); ?>
</option> 
                                    <?php endforeach; endif; unset($_from); ?>
                                </select>    -->

                                <div class="grid">          
                                      <table class="table table-striped table-bordered table-condensed"> 
                                          <tr>
                                              <th>Nome</th>
                                              <th>Matricula</th>
                                              <th>Cargo</th>  
                                              <th class=tdBotao>Selecionar</th>                            
                                          </tr> 
                                          
                                          <?php $_from = $this->_tpl_vars['funcionarios']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['funcionario']):
?>
                                          
                                          <tr>
                                              <td><?php echo $this->_tpl_vars['funcionario']->getFuncionario_Nome(); ?>
</td>
                                              <td><?php echo $this->_tpl_vars['funcionario']->getFuncionario_Matricula(); ?>
</td>
                                              <td><?php echo $this->_tpl_vars['funcionario']->getCargo_Descricao(); ?>
</td> 
                                              <td>
                                                  <label class="radio">
                                                    <input type="radio" name="idFuncionario" value="<?php echo $this->_tpl_vars['funcionario']->getFuncionario_ID(); ?>
">
                                                  </label>
                                              </td>          
                                          </tr>
                                          
                                          <?php endforeach; endif; unset($_from); ?>
                                      </table>
                                </div>
                                                                      
                            </div>
                        </div>
                        <div>
                            <input class="btn btn-primary" type="button" onclick="return enviar();" value="<?php echo $this->_tpl_vars['nomeBotao']; ?>
"/>
                        </div>
                    </form>
                    <button class="btn" onclick="return abreListagem();">Voltar para Listagem</button>
                </fieldset>
            </div>
         </div>
       </div>
    </body>
</html>