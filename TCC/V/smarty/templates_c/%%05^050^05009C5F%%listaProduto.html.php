<?php /* Smarty version 2.6.26, created on 2012-09-18 17:42:34
         compiled from listaProduto.html */ ?>
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>           
<html>
    <?php echo '
    <head>
        <title>Produtos</title>
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
               window.location.href="cadProduto.php";
           }
           
           function editar(idProduto){
             window.location.href="cadProduto.php?idProduto="+idProduto;  
             
           }
           
           function enviar(){
               $("#formUsuario").submit();

           }
           
           function excluir(idProduto){
               if(confirm("Deseja realmente Excluir?")){
                   location.href="excluirProduto.php?idProduto="+idProduto;
               }else{
                   return false;
               }
           
           }
        </script>
                    
    </head>
    '; ?>

    <body>
        <div id="conteudo" <?php if ($this->_tpl_vars['totalProdutos'] > 10): ?> style='height:100%;' <?php endif; ?>>
            <div class="container1">   
                    <?php if ($this->_tpl_vars['ret'] == 'se'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> O Produto foi Excluido com Sucesso!</span>
                    <?php endif; ?>
       
                    <?php if ($this->_tpl_vars['ret'] == 'ee'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel excluir. </span>
                    <?php endif; ?>                                    
                    <fieldset id="tabelaCadastro">
                        <legend id="textoNavegacao">&nbsp;&nbsp;Gerenciar Produtos</legend>
                        <form class="well form-search" name="formProduto" id="formProduto" method="POST" action="listaProdutos.php">
                                <div class="control-group">
                                    <div class="controls" style="margin-bottom:10px;"> 
                                        <label for="nomeProduto" class="control-label" style="font-size:13px;">Produto:</label>
                                        <input type="text" id="nomeProduto" name="nomeProduto" class="input-xlarge arrendondaInputSelect" value="<?php echo $this->_tpl_vars['nomeProduto']; ?>
">
                                       
                                        <label for="precoProduto" class="control-label" style="font-size:13px;margin-left:10px;">Preço:</label>
                                        <div class="input-prepend input-append">
                                            <span class="add-on arrendondaInputSelect">R$</span>
                                            <input id="precoProduto" class="input-small arrendondaInputSelect" type="text" size="16" value="<?php echo $this->_tpl_vars['precoProduto']; ?>
">            
                                        </div>  
                                         
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
                                  <td><a href="#" rel="tooltip" onclick="return editar('');"  title="Clique para Editar este Produto"><i class="icon-edit"></i></a></td>                                  
                                  <td><a href="#" rel="tooltip" onclick="return excluir('');" title="Clique para Excluir este Produto"><i class="icon-trash"></i></a></td>
                              </tr>
                              

                          </table>
                    </div>                    
           </div>
        </div>   
    </body>
</html>