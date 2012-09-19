<?php /* Smarty version 2.6.26, created on 2012-09-18 17:47:11
         compiled from listaMensagem.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Mensagens</title>
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
               window.location.href="cadMensagem.php";
           }
           
           function editar(idMensagem){
             window.location.href="cadMensagem.php?idMensagem="+idMensagem;  
             
           }
           
           function enviar(){
               $("#formUsuario").submit();

           }
           
           function excluir(idMensagem){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirMensagem.php?idMensagem="+idMensagem;
               }else{
                   return false;
               }
           
           }
        </script>
                   
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalMensagens'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">     
                    <?php if ($this->_tpl_vars['ret'] == 'se'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> A Mensagem foi Excluida com Sucesso!</span>
                    <?php endif; ?>
       
                    <?php if ($this->_tpl_vars['ret'] == 'ee'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel excluir. </span>
                    <?php endif; ?>                                
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Gerenciar Mensagens</legend>
                        <form class="well form-search" name="formMensagem" id="formMensagem" method="POST" action="listaMensagens.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;"> 
                                    <label>Titulo</label>
                                    <input type="text" class="span4 mcg" id="nomeMsg"/>    
                                    <label>Destinatário</label>
                                    <input type="text" class="span4 mcg" id="destMsg"/>    
                                    <label>Selecione uma lista cadastrada</label>
                                    <select name="carregaListaMsg" class="span3">
                                        <option value="">::Selecione Lista::</option>
                                        <option value="">João da Silva</option>
                                        <option value="">Paulo Henrique</option>
                                    </select>
                                    <input type="button" class="btn-primary" value="Carregar"/>
                                    <label>Mensagem</label>
                                    <textarea class="input-xlarge mcg" id="descMsg" rows="3"></textarea></br>        
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
                                  <td><a href="#" rel="tooltip" onclick="return editar('');"  title="Clique para Editar esta Mensagem"><i class="icon-edit"></i></a></td>                                  
                                  <td><a href="#" rel="tooltip" onclick="return excluir('');" title="Clique para Excluir esta Mensagem"><i class="icon-trash"></i></a></td>
                              </tr>
                              

                          </table>
                    </div>                    
           </div>
        </div>   
    </body>
</html>