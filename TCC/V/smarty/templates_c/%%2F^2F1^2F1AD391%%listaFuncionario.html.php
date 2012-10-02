<?php /* Smarty version 2.6.26, created on 2012-10-02 03:47:20
         compiled from listaFuncionario.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Funcionarios</title>
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
               window.location.href="cadFuncionario.php";
           }
           
           function editar(idFuncionario){
             window.location.href="cadFuncionario.php?idFuncionario="+idFuncionario;  
             
           }
           
           function enviar(){
               $("#formFuncionario").submit();

           }
           
           function excluir(idFuncionario){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirFuncionario.php?idFuncionario="+idFuncionario;
               }else{
                   return false;
               }
           
           }
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalFuncionarios'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">
                    <?php if ($this->_tpl_vars['ret'] == 'se'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Funcionario foi Excluido com Sucesso!</span>
                    <?php endif; ?>
       
                    <?php if ($this->_tpl_vars['ret'] == 'ee'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel excluir.</span>
                    <?php endif; ?>              
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Funcionarios :: Listagem</legend>
                        <form class="well form-search" name="formFuncionario" id="formFuncionario" method="POST" action="listaFuncionarios.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                        <label for="nomeFuncionario" class="control-label" >Nome:</label>
                                        <input type="text" id="nomeFuncionario" name="nomeFuncionario" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['nomeFuncionario']; ?>
">      
 
                                        <label for="matriculaFuncionario" class="control-label" >Matricula:</label>
                                        <input type="text" id="matriculaFuncionario" name="matriculaFuncionario" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['matriculaFuncionario']; ?>
"> 
                                  
                                    </div>
                                    <div class="controls" style="margin-bottom:10px;">   
                                        <label for="idcargo" class="control-label" >Cargo:</label>
                                        <select id="idcargo" name="idcargo" class="arrendondaInputSelect">
                                           <option value=""></option>
                                            <?php $_from = $this->_tpl_vars['cargos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cargo']):
?>
                                            <option value="<?php echo $this->_tpl_vars['cargo']->getCargo_ID(); ?>
" <?php if ($this->_tpl_vars['cargo']->getCargo_ID() == $this->_tpl_vars['idcargo']): ?> selected='selected' <?php endif; ?> ><?php echo $this->_tpl_vars['cargo']->getCargo_Descricao(); ?>
</option> 
                                            <?php endforeach; endif; unset($_from); ?>
                                        </select>                    
                                    </div>
                                    <div>    
                                        <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                </div>
                           </form>
                    </fieldset>
                    <button onclick="return abreNovo();" class="btn btn-info">Novo Funcionario</button>
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Nome</th>
                                  <th>Matricula</th>
                                  <th>Cargo</th>                              
                                  <th class=tdBotao>Editar</th>
                                  <th class=tdBotao>Excluir</th>
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
                                  <td><a href="#" rel="tooltip" onclick="return editar('<?php echo $this->_tpl_vars['funcionario']->getFuncionario_ID(); ?>
');"  title="Clique para Editar este Funcionario"><i class="icon-edit"></i></a></td>                                  
                                  <td><a href="#" rel="tooltip" onclick="return excluir('<?php echo $this->_tpl_vars['funcionario']->getFuncionario_ID(); ?>
');" title="Clique para Excluir este Funcionario"><i class="icon-trash"></i></a></td>
                              </tr>
                              
                              <?php endforeach; endif; unset($_from); ?>
                          </table>
                    </div>
            </div>
       </div>
    </body>
</html>