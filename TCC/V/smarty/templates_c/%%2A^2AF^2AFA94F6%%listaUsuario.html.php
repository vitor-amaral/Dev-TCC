<?php /* Smarty version 2.6.26, created on 2012-09-29 20:44:02
         compiled from listaUsuario.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Usuarios</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        
        <script type="text/javascript" language="JavaScript" src="../V/js/bootstrap.js"></script>
        
        <script type="text/javascript" >

            $(function(){
                $("[rel=tooltip]").tooltip();
            });
                    
           function abreNovo(){
               window.location.href="cadUsuario.php";
           }
           
           function editar(idUsuario){
             window.location.href="cadUsuario.php?idUsuario="+idUsuario;  
             
           }
           
           function enviar(){
               $("#formUsuario").submit();

           }
           
           function excluir(idUsuario){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirUsuario.php?idUsuario="+idUsuario;
               }else{
                   return false;
               }
           
           }
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalUsuarios'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">
                    <?php if ($this->_tpl_vars['ret'] == 'se'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Usuário foi Excluido com Sucesso!</span>
                    <?php endif; ?>
       
                    <?php if ($this->_tpl_vars['ret'] == 'ee'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel excluir. </span>
                    <?php endif; ?>              
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Usuarios :: Listagem</legend>
                        <form class="well form-search" name="formUsuario" id="formUsuario" method="POST" action="listaUsuarios.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="loginUsuario" class="control-label" >Login:</label>
                                        <input type="text" id="loginUsuario" name="loginUsuario" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['loginUsuario']; ?>
">      
<!--                                    </div>
                                    <div class="controls" style="margin-bottom:10px;"> -->  
                                        <label for="idTipoAcesso" class="control-label" >Tipo Acesso:</label>
                                        <select id="idTipoAcesso" name="idTipoAcesso" class="arrendondaInputSelect">
                                           <option value=""></option>
                                            <?php $_from = $this->_tpl_vars['tipos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tipo']):
?>
                                            <option value="<?php echo $this->_tpl_vars['tipo']->getTipoAcesso_ID(); ?>
" <?php if ($this->_tpl_vars['tipo']->getTipoAcesso_ID() == $this->_tpl_vars['idTipoAcesso']): ?> selected='selected' <?php endif; ?> ><?php echo $this->_tpl_vars['tipo']->getTipoAcesso_Tipo(); ?>
</option> 
                                            <?php endforeach; endif; unset($_from); ?>
                                        </select>                    
                                    <!--<div>-->
                                    <!-- Filtro por funcionário -->
                                    <!--<div class="controls" style="margin-bottom:10px;">   
                                        <label for="idFuncionario" class="control-label" >Funcionario:</label>
                                        <select id="idFuncionario" name="idFuncionario" class="arrendondaInputSelect">
                                           <option value=""></option>
                                            <?php $_from = $this->_tpl_vars['funcionarios']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['funcionario']):
?>
                                            <option value="<?php echo $this->_tpl_vars['funcionario']->getFuncionario_ID(); ?>
" <?php if ($this->_tpl_vars['funcionario']->getFuncionario_ID() == $this->_tpl_vars['idFuncionario']): ?> selected='selected' <?php endif; ?> ><?php echo $this->_tpl_vars['funcionario']->getFuncionario_Nome(); ?>
</option> 
                                            <?php endforeach; endif; unset($_from); ?>
                                        </select>                    
                                    </div>  -->                                  
                                    <!--<div>-->    
                                        <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                </div>
                           </form>
                    </fieldset>
                    <button onclick="return abreNovo();" class="btn btn-info">Novo Usuario</button>
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Login</th>
                                  <th>Tipo Acesso</th> 
                                  <th>Funcionario</th>                                                               
                                  <th class=tdBotao>Editar</th>
                                  <th class=tdBotao>Excluir</th>
                              </tr> 
                              
                              <?php $_from = $this->_tpl_vars['usuarios']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['usuario']):
?>
                              
                              <tr>
                                  <td><?php echo $this->_tpl_vars['usuario']->getUsuario_Login(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['usuario']->getTipoAcesso_Tipo(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['usuario']->getFuncionario_Nome(); ?>
</td>           
                                  <td><a href="#" rel="tooltip" onclick="return editar('<?php echo $this->_tpl_vars['usuario']->getUsuario_ID(); ?>
');"  title="Clique para Editar este Usuario"><i class="icon-edit"></i></a></td>                                  
                                  <td><a href="#" rel="tooltip" onclick="return excluir('<?php echo $this->_tpl_vars['usuario']->getUsuario_ID(); ?>
');" title="Clique para Excluir este Usuario"><i class="icon-trash"></i></a></td>
                              </tr>
                              
                              <?php endforeach; endif; unset($_from); ?>
                          </table>
                    </div>
            </div>
       </div>
    </body>
</html>