<?php /* Smarty version 2.6.26, created on 2012-10-23 04:31:15
         compiled from cadPreferencia.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>       
<html>
    <?php echo '
    <head>
        <title>Preferencias</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../V/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../V/css/processo.css">
        
        <script type="text/javascript" language="JavaScript" src="../V/js/jquery.js"></script>
                
        <script type="text/javascript">
            function abreListagem(){
                window.location.href="listaClientes.php";
            }
          
            function opcoes(link){

                var pergid = $(link).closest("tr").find("#perg").val();  

                    if($("#pref_"+pergid+"_1 #open").hasClass(\'icon-chevron-down\')){
                        $("#pref_"+pergid+"_1 #open").removeClass(\'icon-chevron-down\'); 
                        $("#pref_"+pergid+"_1 #open").addClass(\'icon-chevron-up\');
                    }
                    else{
                        $("#pref_"+pergid+"_1 #open").removeClass(\'icon-chevron-up\'); 
                        $("#pref_"+pergid+"_1 #open").addClass(\'icon-chevron-down\');
                    }
 
                    $("tr[id*=pref_"+pergid+"]").each(
                        function(){
                            if(($(this).attr(\'id\').split("_"))[2] != "1"){
                               $(this).toggle();  //Varia entre show e hide
                            }
                        }
                    );               
                            
            }  
                      
            function editar(link){
                
                $("#fpref").show(); 
                
                //pega os valores guardados nos inputs de cada linha
                var id  = $(link).closest("tr").find("#idlinha").val();
                var perg = $(link).closest("tr").find("#perg").val();
                var pergdesc = $(link).closest("tr").find("#pergdesc").val(); 
                var resp = $(link).closest("tr").find("#resp").val();
                var catresp =  $(link).closest("tr").find("#catresp").val();                 
                var op = $(link).closest("tr").find("#op").val();
                var com = $(link).closest("tr").find("#com").val(); 
                                                         
               //Coloca os valores nos campos do form de edição
                $("#pergid").val(perg); 
                $("#pergunta").html(pergdesc); 
                $("#catresp").val(catresp);              
                $("#opcao").val(op);
                $("#comentario").val(com);                
                $("#resposta_"+catresp).val(resp);
                $("#resposta_"+catresp).show();
                
                //preenche qual a linha da tabela que esta sendo editada
                $("#nomeLi").val(id); 
                
            }

            function adiciona(link){
                                                        
                //todo: Deve exibir as opções ja cadastradas qdo clica no +  (exibir a linha de detalhe)   e alterar o icone para up
                
                if($(link).closest("tr").find("#resp").val() != "")
                {
                    $("#fpref").show();
                     
                   //pega os valores guardados nos inputs de cada linha
                    var pergid = $(link).closest("tr").find("#perg").val();
                    var pergdesc = $(link).closest("tr").find("#pergdesc").val(); 
                    var catresp =  $(link).closest("tr").find("#catresp").val(); 
                    
                    id="pref_"+pergid;
                    total = $("tr[id*="+id+"]").length;
                               
                    var op = total+1; 
                    
                   //Coloca os valores nos campos do form de edição
                    $("#pergid").val(pergid); 
                    $("#pergunta").html(pergdesc); 
                    $("#catresp").val(catresp);              
                    $("#opcao").val(op);
                    $("#comentario").val("");                
                    $("#resposta_"+catresp).show();
                    
                    //vazio pq sera uma linha nova
                    $("#nomeLi").val(""); 
                
                } 
                else
                {
                  window.alert("Para adicionar outra opção, é necessario responder a primeira.");
                }                   
            }            
             
            function excluir(link){
                var id  = $(link).closest("tr").find("#idlinha").val(); 
                var op  = $(link).closest("tr").find("#op").val(); 
                var pergid = $(link).closest("tr").find("#perg").val();
                    
                if(op>1){  
                    
                    if ( window.confirm( "Deseja realmente excluir?" ) ){                       
                        $("#tabelaPreferencia").append("<input type=\'hidden\' name=\'excluidos[]\' id=\'excluidos\' value=\'"+id+"\' />");  
                    
                        $(link).closest("tr").remove();
                        
                        $("#pref_"+pergid+"_1 #open").removeClass(\'icon-chevron-up\'); 
                        $("#pref_"+pergid+"_1 #open").addClass(\'icon-chevron-down\')
                        
                        var total = $("#total").val();
                        var diminuir=((parseFloat(total))-(parseFloat(1)));
                        $("#total").val(parseInt(diminuir));
                        $("#nomeLi").val("");
                          
                    }else{
                        window.location.href=url;
                    }           
                                  
                }
                else
                {
                    window.alert("Só é possível excluir respostas que não são 1° opção.");
                }
            }     
                         
            function salva(){

                var catresp =  $("#catresp").val();
                var pergid =  $("#pergid").val();
                var pergdesc = $("#pergunta").text();
                var resp = $("#resposta_"+catresp).val();
                var respdesc = $("#resp_"+resp).text(); 
                var op = $("#opcao").val();
                var com = $("#comentario").val();
                 
                if(resp != \'\'){
                    var nomeLi = $("#nomeLi").val();      
                    var id ="";

                    var total = $("#total").val();   if(total == ""){ total =0; }
                    var maior = $("#maiorid").val();   if(maior == ""){ maior =0; } 
                                   
                   if(nomeLi == ""){
                       var Soma=((parseFloat(total))+(parseFloat(1)));
                       $("#total").val(parseInt(Soma));

                       var newid=((parseFloat(maior))+(parseFloat(1)));
                       $("#maiorid").val(parseInt(newid));  
                      
                       id="pref_"+pergid+"_"+op;
                    }else{      
                        id =  nomeLi;            
                    }              
                    

                    if(op>1){ //Entra aqui no caso de edicao da segunda opcao ou no caso de adicionar uma seg opcao  
                        var tr =
                            "<td style=\'text-align:right;\'>"+op+"°</td>"+
                            "<td>"+respdesc+"</td>"+
                            "<td>"+com+"</td>"+
                            "<td>"+
                                "<a href=\'#\' id=\'"+pergid+"\' onclick=\'editar(this);\'><i id=\'edit\' class=\'icon-edit\'></i></a> "+                                                                                        
                                "<a href=\'#\' id=\'"+pergid+"\' onclick=\'excluir(this);\'><i id=\'trash\' class=\'icon-trash\'></i></a> "+
                            "</td>"+            
                            "<input type=\'hidden\' name=\'perg[]\' id=\'perg\' value=\'"+pergid+"\' />"+
                            "<input type=\'hidden\' name=\'pergdesc[]\' id=\'pergdesc\' value=\'"+pergdesc+"\' />"+
                            "<input type=\'hidden\' name=\'catresp[]\' id=\'catresp\' value=\'"+catresp+"\' />"+
                            "<input type=\'hidden\' name=\'resp[]\' id=\'resp\' value=\'"+resp+"\' />"+
                            "<input type=\'hidden\' name=\'op[]\' id=\'op\' value=\'"+op+"\' />"+
                            "<input type=\'hidden\' name=\'com[]\' id=\'com\' value=\'"+com+"\' />"+
                            "<input type=\'hidden\' name=\'idlinha[]\' id=\'idlinha\' value=\'"+id+"\' />";  
                    }
                    else{ //Entra aqui no caso de edição da primeira  opcao
                        var tr =
                            "<td>"+pergdesc+"</td>"+
                            "<td>"+respdesc+"</td>"+
                            "<td>"+com+"</td>"+
                            "<td>"+
                                "<a href=\'#\' id=\'"+pergid+"\' onclick=\'editar(this);\'><i id=\'edit\' class=\'icon-edit\'></i></a> "+     
                                "<a href=\'#\' id=\'"+pergid+"\' onclick=\'adiciona(this);\'><i id=\'plus\' class=\'icon-plus\'></i></a> "+                                                                                    
                                "<a href=\'#\' id=\'"+pergid+"\' onclick=\'opcoes(this);\'><i id=\'open\' class=\'icon-chevron-down\'></i></a> "+     
                            "</td>"+            
                            "<input type=\'hidden\' name=\'perg[]\' id=\'perg\' value=\'"+pergid+"\' />"+
                            "<input type=\'hidden\' name=\'pergdesc[]\' id=\'pergdesc\' value=\'"+pergdesc+"\' />"+
                            "<input type=\'hidden\' name=\'catresp[]\' id=\'catresp\' value=\'"+catresp+"\' />"+
                            "<input type=\'hidden\' name=\'resp[]\' id=\'resp\' value=\'"+resp+"\' />"+
                            "<input type=\'hidden\' name=\'op[]\' id=\'op\' value=\'"+op+"\' />"+
                            "<input type=\'hidden\' name=\'com[]\' id=\'com\' value=\'"+com+"\' />"+
                            "<input type=\'hidden\' name=\'idlinha[]\' id=\'idlinha\' value=\'"+id+"\' />";  
                    }
       
                     
                    if(nomeLi == ""){
                        $("#pref_"+pergid+"_"+(op-1)).after("<tr id=\'"+id+"\' class=\\"trdetail\\" >"+tr+"</tr>");
                    }else{           
                        $("#"+nomeLi).html(tr);
                        $("#nomeLi").val("");
                    }
                   
                    
                    //limpa os campos do form de edicão
                    $("#pergunta").val("");
                    $("#pergid").val("");  
                    $("#catresp").val("");                    
                    $("#opcao").val("");
                    $("#comentario").val("");
                    $("#resposta_"+catresp).val(""); 
                    $("#resposta_"+catresp).hide();   
                                                                                                 
                    //Fecha a div do form de edição            
                    $("#fpref").hide();                      
                }
                else
                {
                    window.alert("Selecione uma resposta.");
                }

            }   
               
            
        </script>
    </head>
    '; ?>

    <body>
        <div id="conteudo">
            <div class="container1">
                <div class="asdf">
                    <?php if ($this->_tpl_vars['ret'] == 'sc'): ?>
                            <span class="label label-success">SUCESSO</span>
                            <span> A preferência foi Cadastrada com Sucesso!</span>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['ret'] == 'ec'): ?>
                            <span class="label label-important">ERRO</span>
                            <span> Não foi possivel Cadastrar.</span>  
                    <?php endif; ?>                                           
                <fieldset id="tabelaCadastro">
                    <legend id="textoNavegacao">&nbsp;&nbsp;Preferências :: <?php echo $this->_tpl_vars['msg']; ?>
</legend>
                    <form class="well form-inline" name="formPreferencia" id="formPreferencia" method="POST" action="salvaPreferencia.php">
                        <div class="control-group">
                            <input type="hidden" name="Save" id="Save" value="<?php echo $this->_tpl_vars['Save']; ?>
" />
                            <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $this->_tpl_vars['idCliente']; ?>
" />                                
                                
                            <div class="well" id="fpref" style="border:1px;color:#4D9DA8;border-style:solid; display:none;">
                                <div class="controls" style="margin-bottom:10px;">
                                   <label class="control-label" id="pergunta" for="pergid"></label>

                                   <input type="hidden" name="pergid" id="pergid" />
                                   <input type="hidden" name="catresp" id="catresp" />
                                   
                                   <?php $_from = $this->_tpl_vars['categorias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?> 
                                    <?php $this->assign('categoria', $this->_tpl_vars['cat']->getCatResp_ID()); ?>
                                       <select id= "resposta_<?php echo $this->_tpl_vars['cat']->getCatResp_ID(); ?>
" class="arrendondaInputSelect" style="display:none;" >
                                          <option value="">Selecione</option>
                                           <?php $_from = $this->_tpl_vars['respostas'][$this->_tpl_vars['categoria']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['resp']):
?>
                                           <option id="resp_<?php echo $this->_tpl_vars['resp']->getResp_ID(); ?>
" value="<?php echo $this->_tpl_vars['resp']->getResp_ID(); ?>
" > <?php echo $this->_tpl_vars['resp']->getResp_Valor(); ?>
 </option> 
                                           <?php endforeach; endif; unset($_from); ?>
                                       </select>
                                   <?php endforeach; endif; unset($_from); ?>  
                                   
                                   <label for="opcao" class="control-label" >Prioridade/Opção:</label>
                                   <input type="text" id="opcao" name="opcao" class="input-small arrendondaInputSelect" disabled/>
                                                                      
                                </div>
                                <div class="controls" style="margin-bottom:10px;"> 
                                                                    
                                   <label for="comentario" class="control-label" >Observação:</label>
                                   <textarea  id="comentario" name="comentario" class="input-xlarge"></textarea>
                                    
                                   <p>
                                       <input type="button" value="Salvar" class="btn btn-small" onClick="salva()">
                                   </p>
                                </div>
                            </div>
                       
                            <table id="tabelaPreferencia" class="table tablepref table-bordered table-condensed">
                                <tr>
                                    <th>Pergunta</th>
                                    <th>Resposta</th> 
                                    <th>Observação</th>                                     
                                    <th>Ações</th>
                                </tr>
                                            
                                <?php $_from = $this->_tpl_vars['preferencias']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['pref']):
        $this->_foreach['loop']['iteration']++;
?>
                                <?php if ($this->_tpl_vars['pref']->getPref_Opcao() > 1): ?>
                                    <tr id="pref_<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
_<?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
" style="display:none;" class="trdetail">
                                        <td style="text-align:right;"><?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
°</td>
                                        <td><?php echo $this->_tpl_vars['pref']->getResp_Valor(); ?>
</td>
                                        <td><?php echo $this->_tpl_vars['pref']->getPref_Comentario(); ?>
</td>
                                        <td>
                                            <a href="#" id="<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
" onclick="editar(this);"><i id="edit" class="icon-edit"></i></a>
                                            <a href='#' id="<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
" onclick='excluir(this);'><i id="trash" class='icon-trash'></i></a>
                                        </td>
                                        <input type='hidden' name='perg[]' id='perg' value='<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
' />
                                        <input type='hidden' name='pergdesc[]' id='pergdesc' value='<?php echo $this->_tpl_vars['pref']->getPerg_Descricao(); ?>
' />
                                        <input type='hidden' name='catresp[]' id='catresp' value='<?php echo $this->_tpl_vars['pref']->getCatResp_ID(); ?>
' />
                                        <input type='hidden' name='resp[]' id='resp' value='<?php echo $this->_tpl_vars['pref']->getResp_ID(); ?>
' />
                                        <input type='hidden' name='op[]' id='op' value='<?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
' />
                                        <input type='hidden' name='com[]' id='com' value='<?php echo $this->_tpl_vars['pref']->getPref_Comentario(); ?>
' />
                                        <input type='hidden' name='idlinha[]' id='idlinha' value='pref_<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
_<?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
' />
                                    </tr>
                                <?php else: ?>
                                    <tr id="pref_<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
_<?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
">
                                        <td><?php echo $this->_tpl_vars['pref']->getPerg_Descricao(); ?>
</td>
                                        <td><?php echo $this->_tpl_vars['pref']->getResp_Valor(); ?>
</td>
                                        <td><?php echo $this->_tpl_vars['pref']->getPref_Comentario(); ?>
</td> 
                                        <td>
                                            <a href="#" id="<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
" onclick="editar(this);"><i id="edit" class="icon-edit"></i></a>
                                            <?php if ($this->_tpl_vars['pref']->getResp_Valor() != ''): ?>
                                                <a href='#' id="<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
" onclick='adiciona(this);'><i id="plus" class='icon-plus'></i></a>
                                            <?php endif; ?>
                                            <a href='#' id="<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
" onclick='opcoes(this);'><i id="open" class='icon-chevron-down'></i></a>
                                        </td>
                                        <input type='hidden' name='perg[]' id='perg' value='<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
' />
                                        <input type='hidden' name='pergdesc[]' id='pergdesc' value='<?php echo $this->_tpl_vars['pref']->getPerg_Descricao(); ?>
' />
                                        <input type='hidden' name='catresp[]' id='catresp' value='<?php echo $this->_tpl_vars['pref']->getCatResp_ID(); ?>
' />
                                        <input type='hidden' name='resp[]' id='resp' value='<?php echo $this->_tpl_vars['pref']->getResp_ID(); ?>
' />
                                        <input type='hidden' name='op[]' id='op' value='<?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
' />
                                        <input type='hidden' name='com[]' id='com' value='<?php echo $this->_tpl_vars['pref']->getPref_Comentario(); ?>
' />
                                        <input type='hidden' name='idlinha[]' id='idlinha' value='pref_<?php echo $this->_tpl_vars['pref']->getPerg_ID(); ?>
_<?php echo $this->_tpl_vars['pref']->getPref_Opcao(); ?>
' />
                                    </tr>
                                <?php endif; ?>   
                                <?php endforeach; endif; unset($_from); ?>
                                <input type="hidden" name="nomeLi" id="nomeLi" value=""/>
                                <input type='hidden' name='total' id='total' value='<?php echo $this->_tpl_vars['total']; ?>
' />
                                <input type='hidden' name='maiorid' id='maiorid' value='<?php echo $this->_tpl_vars['maiorid']; ?>
' />                                    
                            </table>  
                                             
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit"><?php echo $this->_tpl_vars['nomeBotao']; ?>
</button>     
                        </div>
                    </form>
                    <button class="btn" onclick="return abreListagem();">Voltar para Listagem</button>
                </fieldset>
            </div>
         </div>
       </div>
    </body>
</html>