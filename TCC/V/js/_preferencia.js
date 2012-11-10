            function opcoes(link){

                var pergid = $(link).closest("tr").find("#perg").val();  

                    if($("#pref_"+pergid+"_1 #open").hasClass('icon-chevron-down')){
                        $("#pref_"+pergid+"_1 #open").removeClass('icon-chevron-down'); 
                        $("#pref_"+pergid+"_1 #open").addClass('icon-chevron-up');
                    }
                    else{
                        $("#pref_"+pergid+"_1 #open").removeClass('icon-chevron-up'); 
                        $("#pref_"+pergid+"_1 #open").addClass('icon-chevron-down');
                    }
 
                    $("tr[id*=pref_"+pergid+"]").each(
                        function(){
                            if(($(this).attr('id').split("_"))[2] != "1"){
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
                                              
                if($(link).closest("tr").find("#resp").val() != "")
                {

                    $("#fpref").show();  
                                        
                   //pega os valores guardados nos inputs de cada linha
                    var pergid = $(link).closest("tr").find("#perg").val();
                    var pergdesc = $(link).closest("tr").find("#pergdesc").val(); 
                    var catresp =  $(link).closest("tr").find("#catresp").val(); 
                                                    
                    //abrir as opcoes e alterar o icone pra up                    
                    $("tr[id*=pref_"+pergid+"]").each(
                        function(){
                               $(this).show();
                        }
                    );   
                    $("#pref_"+pergid+"_1 #open").removeClass('icon-chevron-down'); 
                    $("#pref_"+pergid+"_1 #open").addClass('icon-chevron-up');                    
                           
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
                        $("#tabelaPreferencia").append("<input type='hidden' name='excluidos[]' id='excluidos' value='"+id+"' />");  
                    
                        $(link).closest("tr").remove();
                        
                        $("#pref_"+pergid+"_1 #open").removeClass('icon-chevron-up'); 
                        $("#pref_"+pergid+"_1 #open").addClass('icon-chevron-down')
                        
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
                 
                if(resp != ''){
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
                            "<td style='text-align:right;'>"+op+"&ordm;</td>"+
                            "<td>"+respdesc+"</td>"+
                            "<td>"+com+"</td>"+
                            "<td>"+
                                "<a href='#' id='"+pergid+"' onclick='editar(this);'><i id='edit' class='icon-edit'></i></a> "+                                                                                        
                                "<a href='#' id='"+pergid+"' onclick='excluir(this);'><i id='trash' class='icon-trash'></i></a> "+
                            "</td>"+            
                            "<input type='hidden' name='perg[]' id='perg' value='"+pergid+"' />"+
                            "<input type='hidden' name='pergdesc[]' id='pergdesc' value='"+pergdesc+"' />"+
                            "<input type='hidden' name='catresp[]' id='catresp' value='"+catresp+"' />"+
                            "<input type='hidden' name='resp[]' id='resp' value='"+resp+"' />"+
                            "<input type='hidden' name='op[]' id='op' value='"+op+"' />"+
                            "<input type='hidden' name='com[]' id='com' value='"+com+"' />"+
                            "<input type='hidden' name='idlinha[]' id='idlinha' value='"+id+"' />";  
                    }
                    else{ //Entra aqui no caso de edição da primeira  opcao
                        var tr =
                            "<td>"+                            
                                "<a href='#' id='"+pergid+"' onclick='opcoes(this);'><i id='open' class='icon-chevron-down'></i></a> "+pergdesc+
                            "</td>"+
                            "<td>"+respdesc+"</td>"+
                            "<td>"+com+"</td>"+
                            "<td>"+
                                "<a href='#' id='"+pergid+"' onclick='editar(this);'><i id='edit' class='icon-edit'></i></a> "+     
                                "<a href='#' id='"+pergid+"' onclick='adiciona(this);'><i id='plus' class='icon-plus'></i></a> "+
                            "</td>"+            
                            "<input type='hidden' name='perg[]' id='perg' value='"+pergid+"' />"+
                            "<input type='hidden' name='pergdesc[]' id='pergdesc' value='"+pergdesc+"' />"+
                            "<input type='hidden' name='catresp[]' id='catresp' value='"+catresp+"' />"+
                            "<input type='hidden' name='resp[]' id='resp' value='"+resp+"' />"+
                            "<input type='hidden' name='op[]' id='op' value='"+op+"' />"+
                            "<input type='hidden' name='com[]' id='com' value='"+com+"' />"+
                            "<input type='hidden' name='idlinha[]' id='idlinha' value='"+id+"' />";  
                    }
       
                     
                    if(nomeLi == ""){
                        $("#pref_"+pergid+"_"+(op-1)).after("<tr id='"+id+"' class=\"trdetail\" >"+tr+"</tr>");
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
            
            //---------------------------------------------------------------------------------------------------------------------------------------------------
            
            function editarref(link){
              
                //pega os valores guardados nos inputs de cada linha
                var idref  = $(link).closest("tr").find("#idlinharef").val();
                var pergref = $(link).closest("tr").find("#pergref").val();
                var pergdescref = $(link).closest("tr").find("#pergdescref").val(); 
                var respref = $(link).closest("tr").find("#respref").val();
                var catrespref =  $(link).closest("tr").find("#catrespref").val();                 
                var opref = $(link).closest("tr").find("#opref").val();
                var comref = $(link).closest("tr").find("#comref").val();   
                var catresptab = $(link).closest("tr").find("#catresptab").val();                                                              

                $.ajax({

                  type: 'post',//método de envio
                  data: {   idref: idref,
                            pergref: pergref,
                            pergdesc: pergdescref,
                            respref: respref,
                            catrespref:catrespref,
                            opref: opref,
                            comref: comref,
                            catresptab: catresptab
                  },
                  url:'a.php',//pagina php que necessita
                  success: function(retorno){ 
                    $('#retorno').html(retorno); //nessa linha o retorno q a página dados.php tiver será colocado no elemento html q tiver o id = resposta
                  }
                });
                 
                 //Coloca os valores nos campos do form de edição
                $("#pergidref").val(pergref); 
                $("#opcaoref").val(opref);
                $("#comentarioref").val(comref);
                $("#perguntaref").html(pergdescref); 
                $("#catrespref").val(catrespref); 
                $("#catresptab").val(catresptab);                
                                                                         
                //preenche qual a linha da tabela que esta sendo editada
                $("#nomeLiref").val(idref);                 
            }   
            
            function salvaref(){
                
                $('input:radio[name=respostaref]').each(function() {                    
                    if ($(this).is(':checked'))
                        resposta = $(this).val();  

                });  
                

                var resp = (resposta.split("|"))[0];        
                var respdesc = (resposta.split("|"))[1];    
                var op = $("#opcaoref").val();               
                var com = $("#comentarioref").val();         
                var pergid = $("#pergidref").val();          
                var pergdesc = $("#perguntaref").text();     
                var catresp = $("#catrespref").val();           
                var catresptab = $("#catresptab").val();         
                

                if(resp != ''){  
                    
                    var nomeLi = $("#nomeLiref").val();      
                    var id ="";

                    var total = $("#totalref").val();   if(total == ""){ total =0; }
                    var maior = $("#maioridref").val();   if(maior == ""){ maior =0; } 
                                   
                   if(nomeLi == ""){
                       var Soma=((parseFloat(total))+(parseFloat(1)));
                       $("#totalref").val(parseInt(Soma));

                       var newid=((parseFloat(maior))+(parseFloat(1)));
                       $("#maioridref").val(parseInt(newid));  
                      
                       id="prefref_"+pergid+"_"+op;
                    }else{      
                        id =  nomeLi;            
                    } 
                    
                    if(op>1){ //Entra aqui no caso de edicao da segunda opcao ou no caso de adicionar uma seg opcao  
                        var tr =
                            "<td style='text-align:right;'>"+op+"&ordm;</td>"+
                            "<td>"+respdesc+"</td>"+
                            "<td>"+com+"</td>"+
                            "<td>"+
                                "<a href='#windowTitleDialog' id='"+pergid+"' onclick='editarref(this);' data-toggle=\"modal\"><i id='edit' class='icon-edit'></i></a> "+                                                                                            
                                "<a href='#' id='"+pergid+"' onclick='excluirref(this);'><i id='trash' class='icon-trash'></i></a> "+
                            "</td>"+            
                            "<input type='hidden' name='pergref[]' id='pergref' value='"+pergid+"' />"+
                            "<input type='hidden' name='pergdescref[]' id='pergdescref' value='"+pergdesc+"' />"+
                            "<input type='hidden' name='catrespref[]' id='catrespref' value='"+catresp+"' />"+
                            "<input type='hidden' name='catresptab[]' id='catresptab' value='"+catresptab+"' />"+  
                            "<input type='hidden' name='respref[]' id='respref' value='"+resp+"' />"+
                            "<input type='hidden' name='opref[]' id='opref' value='"+op+"' />"+
                            "<input type='hidden' name='comref[]' id='comref' value='"+com+"' />"+
                            "<input type='hidden' name='idlinharef[]' id='idlinharef' value='"+id+"' />";
                    }
                    else{ //Entra aqui no caso de edição da primeira  opcao
                        var tr =
                            "<td>"+                            
                                "<a href='#' id='"+pergid+"' onclick='opcoesref(this);'><i id='open' class='icon-chevron-down'></i></a> "+pergdesc+
                            "</td>"+
                            "<td>"+respdesc+"</td>"+
                            "<td>"+com+"</td>"+
                            "<td>"+
                                "<a href='#windowTitleDialog' id='"+pergid+"' onclick='editarref(this);' data-toggle=\"modal\"><i id='edit' class='icon-edit'></i></a> "+     
                                "<a href='#windowTitleDialog' id='"+pergid+"' onclick='adicionaref(this);' data-toggle=\"modal\"><i id='plus' class='icon-plus'></i></a> "+
                            "</td>"+            
                            "<input type='hidden' name='pergref[]' id='pergref' value='"+pergid+"' />"+
                            "<input type='hidden' name='pergdescref[]' id='pergdescref' value='"+pergdesc+"' />"+
                            "<input type='hidden' name='catrespref[]' id='catrespref' value='"+catresp+"' />"+
                            "<input type='hidden' name='catresptab[]' id='catresptab' value='"+catresptab+"' />"+  
                            "<input type='hidden' name='respref[]' id='respref' value='"+resp+"' />"+
                            "<input type='hidden' name='opref[]' id='opref' value='"+op+"' />"+
                            "<input type='hidden' name='comref[]' id='comref' value='"+com+"' />"+
                            "<input type='hidden' name='idlinharef[]' id='idlinharef' value='"+id+"' />";

                    }
                    
                    if(nomeLi == ""){
                        $("#prefref_"+pergid+"_"+(op-1)).after("<tr id='"+id+"' class=\"trdetail\" >"+tr+"</tr>");
                    }else{           
                        $("#"+nomeLi).html(tr);
                        $("#nomeLi").val("");
                    };   
                    
                     //todo: limpa os campos do form de edicão
                                     
                                        
                }
                else
                {
                    window.alert("Selecione uma resposta.");
                }   
    
            }
            
             function adicionaref(link){
                                              
                if($(link).closest("tr").find("#respref").val() != "")
                {
                    //pega os valores guardados nos inputs de cada linha
                    var pergref = $(link).closest("tr").find("#pergref").val();
                    var pergdescref = $(link).closest("tr").find("#pergdescref").val(); 
                    var respref = $(link).closest("tr").find("#respref").val();
                    var catrespref =  $(link).closest("tr").find("#catrespref").val();                 
                    var catresptab = $(link).closest("tr").find("#catresptab").val();
                    
                    var id="prefref_"+pergref;
                    var total = $("tr[id*="+id+"]").length;          
                    var op = total+1; 
                    
                     //Coloca os valores nos campos do form de edição
                    $("#pergidref").val(pergref); 
                    $("#opcaoref").val(op);
                    $("#comentarioref").val("");
                    $("#perguntaref").html(pergdescref); 
                    $("#catrespref").val(catrespref); 
                    $("#catresptab").val(catresptab);
                                        
                    $.ajax({

                      type: 'post',//método de envio
                      data: { catresptab: catresptab },
                      url:'a.php',//pagina php que necessita
                      success: function(retorno){ 
                        $('#retorno').html(retorno); //nessa linha o retorno q a página dados.php tiver será colocado no elemento html q tiver o id = resposta
                      }
                    });                         
                                        
                    //vazio pq sera uma linha nova
                    $("#nomeLiref").val(""); 
                
                } 
                else
                {
                  window.alert("Para adicionar outra opção, é necessario responder a primeira.");
                }                   
            }            
            
            function excluirref(link){
                var id  = $(link).closest("tr").find("#idlinharef").val(); 
                var op  = $(link).closest("tr").find("#opref").val(); 
                var pergid = $(link).closest("tr").find("#pergref").val();
                 
                    
                if(op>1){  
                    
                    if ( window.confirm( "Deseja realmente excluir?" ) ){                       
                        $("#tabelaPreferenciaref").append("<input type='hidden' name='excluidosref[]' id='excluidosref' value='"+id+"' />");  
                    
                        $(link).closest("tr").remove();
                        
                        var total = $("#totalref").val();
                        var diminuir=((parseFloat(total))-(parseFloat(1)));
                        $("#totalref").val(parseInt(diminuir));
                        $("#nomeLiref").val("");
                          
                    }else{
                        window.location.href=url;
                    }           
                                  
                }
                else
                {
                    window.alert("Só é possível excluir respostas que não são 1° opção.");
                }
            }             