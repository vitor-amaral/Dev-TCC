<?php /* Smarty version 2.6.26, created on 2012-11-10 22:58:44
         compiled from listaAmbiente.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Ambientes</title>   
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
               window.location.href="cadAmbiente.php";
           }
           
           function editar(idAmbiente){
             window.location.href="cadAmbiente.php?idAmbiente="+idAmbiente;  
             
           }
           
           function enviar(){
               $("#formUsuario").submit();

           }
           
           function excluir(idAmbiente){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirAmbiente.php?idAmbiente="+idAmbiente;
               }else{
                   return false;
               }
           
           }
        </script>
                         
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalAmbientes'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">  
                    <?php if ($this->_tpl_vars['ret'] == 'se'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Ambiente foi Excluido com Sucesso!</span>
                    <?php endif; ?>
       
                    <?php if ($this->_tpl_vars['ret'] == 'ee'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel excluir. </span>
                    <?php endif; ?>                         
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Gerenciar Ambientes</legend>
                        <form class="well form-search" name="formAmbiente" id="formAmbiente" method="POST" action="listaAmbientes.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">
                                    <label for="nomeAmbiente" class="control-label" style="font-size:13px;">Ambiente:</label>  
                                    <input type="text" class="input-xlarge arrendondaInputSelect" id="nomeAmbiente" name="nomeAmbiente" value="<?php echo $this->_tpl_vars['nomeAmbiente']; ?>
"/>
                                    <br/><br/>
                                    <label for="descAmbiente" class="control-label" style="font-size:13px;">Descrição:</label>  
                                    <textarea class="input-xlarge mcg" id="descAmbiente" rows="3"></textarea></br>                                                
                                    <br/>
                                        <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                </div>
                           </form>
                    </fieldset>

                    <button onclick="return abreNovo();" class="btn btn-info">Novo Ambiente</button>
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th>Ambiente</th>
                                  <th>Descrição</th>                                                             
                                  <th class=tdBotao>Editar</th>
                                  <th class=tdBotao>Excluir</th>
                              </tr> 
                              
                              <?php $_from = $this->_tpl_vars['ambientes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ambiente']):
?>
                              
                              <tr>
                                  <td><?php echo $this->_tpl_vars['ambiente']->getAmb_Nome(); ?>
</td>
                                  <td><?php echo $this->_tpl_vars['ambiente']->getAmb_Descricao(); ?>
</td>                                                                
                                  <td><a href="#" rel="tooltip" onclick="return editar('<?php echo $this->_tpl_vars['ambiente']->getAmb_ID(); ?>
');"  title="Clique para Editar este Ambiente"><i class="icon-edit"></i></a></td>                                  
                                  <td><a href="#" rel="tooltip" onclick="return excluir('<?php echo $this->_tpl_vars['ambiente']->getAmb_ID(); ?>
');" title="Clique para Excluir este Ambiente"><i class="icon-trash"></i></a></td>
                              </tr>
                              
                              <?php endforeach; endif; unset($_from); ?>

                          </table>
                    </div>
                                                       
                </div>
           </div>
    </body>
</html>