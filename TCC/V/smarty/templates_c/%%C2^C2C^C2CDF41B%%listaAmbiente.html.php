<?php /* Smarty version 2.6.26, created on 2012-09-18 17:42:37
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
                                    <label for="" class="control-label" style="font-size:13px;">Ambiente:</label>  
                                    <input type="text" class="input-xlarge arrendondaInputSelect mcg" id=""/>                                
                                    <br/><br/>
                                    <label for="" class="control-label" style="font-size:13px;">Descrição:</label>  
                                    <textarea class="input-xlarge mcg" id="descMsg" rows="3"></textarea></br>                                                
                                    <br/>
                                        <button type="submit" onclick="enviar();" class="btn">Procurar</button>
                                    </div>
                                </div>
                           </form>
                    </fieldset>

                    <button onclick="return abreNovo();" class="btn btn-info">Novo Usuario</button>
                    <div class="grid">                        
                          <table class="table table-striped table-bordered table-condensed"> 
                              <tr>
                                  <th></th>
                                  <th></th> 
                                  <th></th>                                                               
                                  <th class=tdBotao>Editar</th>
                                  <th class=tdBotao>Excluir</th>
                              </tr> 
                              

                              
                              <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>           
                                  <td><a href="#" rel="tooltip" onclick="return editar('');"  title="Clique para Editar este Ambiente"><i class="icon-edit"></i></a></td>                                  
                                  <td><a href="#" rel="tooltip" onclick="return excluir('');" title="Clique para Excluir este Ambiente"><i class="icon-trash"></i></a></td>
                              </tr>
                              

                          </table>
                    </div>
                                                       
                </div>
           </div>
    </body>
</html>