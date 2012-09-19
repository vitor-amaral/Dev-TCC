<?php /* Smarty version 2.6.26, created on 2012-09-18 17:47:05
         compiled from listaEvento.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Eventos</title>
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
               window.location.href="cadEvento.php";
           }
           
           function editar(idEvento){
             window.location.href="cadEvento.php?idEvento="+idEvento;  
             
           }
           
           function enviar(){
               $("#formUsuario").submit();

           }
           
           function excluir(idEvento){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirEvento.php?idEvento="+idEvento;
               }else{
                   return false;
               }
           
           }
        </script>
        
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalEventos'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">  
                    <?php if ($this->_tpl_vars['ret'] == 'se'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Evento foi Excluido com Sucesso!</span>
                    <?php endif; ?>
       
                    <?php if ($this->_tpl_vars['ret'] == 'ee'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel excluir. </span>
                    <?php endif; ?>                                    
                    <fieldset id="tabelaCadastro">                                  
                        <legend id="textoNavegacao">&nbsp;&nbsp;Gerenciar Eventos</legend>
                        <form class="well form-search" name="formEvento" id="formEvento" method="POST" action="listaEventos.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;">                                    
                                    <label>Título</label>
                                    <input type="text" class="span4 mcg" id="nomeEvento"/>                    
                                    <label>Tema</label>
                                    <input type="text" class="span3 mcg" id="temaEvento" placeholder="Como lembrar do cliente..."/>                    
                                    <label>Data do Evento</label>
                                    <input type="text" class="span2 mcg" id="dtEvento"/>                                        
                                    <label>Horário</label>                    
                                    <input type="text" class="span1 mcg" id="horaEvento"/>
                                    <label>Público alvo</label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="cbInfantil" value="infantil"/>Infantil</br>
                                        <input type="checkbox" name="cbJovem" value="jovem"/>Jovem</br>
                                        <input type="checkbox" name="cbAdulto" value="adulto"/>Adulto</br>
                                        <input type="checkbox" name="cbIdoso" value="idoso"/>3° Idade    
                                    </label>    
                                    <label>Observação</label>
                                    <textarea class="input-xlarge" id="obsEvento" rows="3"></textarea></br>        
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
                                  <td><a href="#" rel="tooltip" onclick="return editar('');"  title="Clique para Editar este Evento"><i class="icon-edit"></i></a></td>                                  
                                  <td><a href="#" rel="tooltip" onclick="return excluir('');" title="Clique para Excluir este Evento"><i class="icon-trash"></i></a></td>
                              </tr>
                              

                          </table>
                    </div>                    
           </div>
        </div>   
    </body>
</html>