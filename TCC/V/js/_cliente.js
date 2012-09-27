function adicionaEndereco(){
    if($("#endereco").val() != ""){
        var nomeLiEnd = $("#nomeLiEnd").val();
        var idEnd ="";
        var idEndbd ="";
        
        var total = $("#totalEndereco").val();   if(total == ""){ total =0; }
        var maior = $("#maiorEndid").val();   if(maior == ""){ maior =0; }  
                
        if(nomeLiEnd == ""){
            var Soma=((parseFloat(total))+(parseFloat(1)));
            $("#totalEndereco").val(parseInt(Soma));

            var newid=((parseFloat(maior))+(parseFloat(1)));
            $("#maiorEndid").val(parseInt(newid));
            idEnd = newid;
        }else{
            idEnd =  (nomeLiEnd.split("_"))[1];
            idEndbd =  (nomeLiEnd.split("_"))[2];
        }
        
        var end =  $("#endereco").val();
        var numero = $("#numero").val();  
        var comp = $("#complemento").val();
        var bairro = $("#bairro").val();         
        var cep = $("#cep").val(); 
        var cidade = $("#cidade").val();
        var cidadeNome =  $("#"+cidade).text();
        
      
        var tr =
            "<td>"+end+"</td>"+
            "<td>"+numero+"</td>"+
            "<td>"+comp+"</td>"+
            "<td>"+bairro+"</td>"+
            "<td>"+cep+"</td>"+
            "<td>"+cidadeNome+"</td>"+
            "<td><a href='#' id="+idEnd+" onclick='editarEndereco(this);'><i class='icon-edit'></i></a> "+
                "<a href='#' id="+idEnd+" onclick='excluirEndereco(this);'><i class='icon-trash'></i></a></td>"+
            "<input type='hidden' name='end[]' id='end' value='"+end+"' />"+
            "<input type='hidden' name='comp[]' id='comp' value='"+comp+"' />"+
            "<input type='hidden' name='num[]' id='num' value='"+numero+"' />"+
            "<input type='hidden' name='ceptab[]' id='ceptab' value='"+cep+"' />"+
            "<input type='hidden' name='bairrotab[]' id='bairrotab' value='"+bairro+"' />"+
            "<input type='hidden' name='cid[]' id='cid' value='"+cidade+"' />"+
            "<input type='hidden' name='idEnd[]' id='idEnd' value='"+idEnd+"' />"+
            "<input type='hidden' name='idEndbd[]' id='idEndbd' value='"+idEndbd+"' />";

        if(nomeLiEnd == ""){
            $("#tabelaEndereco").append("<tr id='endereco_"+idEnd+"_"+idEndbd+"' class=\"tdTable\" >"+tr+"</tr>");
        }else{
            $(nomeLiEnd).html(tr);
            $("#nomeLiEnd").val("");
        }
                    
        $("#endereco").val(" ");
        $("#complemento").val(" ");
        $("#cep").val(" ");
        $("#bairro").val(" ");
        $("#cidade").val(" ");
        $("#numero").val(" ");


        $("#enderecos").show();
    }else{
        alert("Escreva o Endereço para adicionar");
        $("#endereco").focus();
    }
}

function excluirEndereco(link){

    if ( window.confirm( "Deseja realmente excluir?" ) ){
        var idEnd  = $(link).closest("tr").find("#idEnd").val(); 
        var idEndbd = $(link).closest("tr").find("#idEndbd").val();        

        $("#tabelaEndereco").append("<input type='hidden' name='EndExcluidos[]' id='EndExcluidos' value='"+idEndbd+"' />")
    
        $(link).closest("tr").remove();
        
        var total = $("#totalEndereco").val();
        var diminuir=((parseFloat(total))-(parseFloat(1)));
        $("#totalEndereco").val(parseInt(diminuir));
        $("#nomeLiEnd").val(""); 
        
    }else{
        window.location.href=url;
    } 
    
}

function editarEndereco(link){
    
    var idEndbd = $(link).closest("tr").find("#idEndbd").val();   
    var idEnd  = $(link).closest("tr").find("#idEnd").val();   
    var end =  $(link).closest("tr").find("#end").val();
    var comp = $(link).closest("tr").find("#comp").val();
    var cep = $(link).closest("tr").find("#ceptab").val();
    var numero = $(link).closest("tr").find("#num").val();
    var bairro = $(link).closest("tr").find("#bairrotab").val();
    var cidade = $(link).closest("tr").find("#cid").val();
  
   
    $("#endereco").val(end);
    $("#complemento").val(comp);
    $("#cep").val(cep);
    $("#bairro").val(bairro);
    $("#cidade").val(cidade);
    $("#numero").val(numero);       
           
    $("#nomeLiEnd").val("#endereco_"+idEnd+"_"+idEndbd); 
    
}
     
function adicionaTelefone(){                       
    if($("#telefone").val() != ""){
        var nomeLitel = $("#nomeLiTel").val();      
        var idtel ="";
        var idtelbd="";
        
        var total = $("#totalTelefone").val();   if(total == ""){ total =0; }
        var maior = $("#maiortelid").val();   if(maior == ""){ maior =0; }     

       if(nomeLitel == ""){

            var Soma=((parseFloat(total))+(parseFloat(1)));
            $("#totalTelefone").val(parseInt(Soma));

            var newid=((parseFloat(maior))+(parseFloat(1)));
            $("#maiortelid").val(parseInt(newid));
            idtel = newid;
             
        }else{
            idtel =  (nomeLitel.split("_"))[1];
            idtelbd =  (nomeLitel.split("_"))[2];
        }
         
        var telefone =  $("#telefone").val();
        var idTipoTelefone = $("#tipoTelefone").val();
        var tipoTelefone = $("#tel_"+idTipoTelefone).text();
        var obsTel = $("#obsTelefone").val(); 
                                        
        var tr =
            "<td>"+telefone+"</td>"+
            "<td>"+tipoTelefone+"</td>"+ 
            "<td>"+obsTel+"</td>"+
            "<td><a href='#' id="+idtel+" onclick='editarTelefone(this);'><i class='icon-edit'></i></a> "+
                 "<a href='#' id="+idtel+" onclick='excluirTelefone(this);'><i class='icon-trash'></i></a></td>"+
            "<input type='hidden' name='tel[]' id='tel' value='"+telefone+"' />"+
            "<input type='hidden' name='tipoTel[]' id='tipoTel' value='"+idTipoTelefone+"' />"+
            "<input type='hidden' name='obsTel[]' id='obsTel' value='"+obsTel+"' />"+
            "<input type='hidden' name='idTel[]' id='idTel' value='"+idtel+"' />"+ 
            "<input type='hidden' name='idTelbd[]' id='idTelbd' value='"+idtelbd+"' />";

        if(nomeLitel == ""){
            $("#tabelaTelefone").append("<tr id='telefone_"+idtel+"_"+idtelbd+"' class=\"tdTable\" >"+tr+"</tr>");
        }else{
            $(nomeLitel).html(tr);
            $("#nomeLiTel").val("");
        }
       
        $("#telefone").val(" ");
        $("#tipoTelefone").val(" ");
        $("#obsTelefone").val(" ");  


        $("#telefones").show();
    }else{
        alert("Digite o Número do Telefone e Selecione o Tipo para adicionar!");
        $("#telefone").focus();
    }

}


function editarTelefone(link){     

   var idtelbd = $(link).closest("tr").find("#idTelbd").val();   
   var idtel  = $(link).closest("tr").find("#idTel").val();                                  
   var telefone  = $(link).closest("tr").find("#tel").val();
   var tipoTelefone  =  $(link).closest("tr").find("#tipoTel").val();
   var obsTelefone =    $(link).closest("tr").find("#obsTel").val(); 

   $("#telefone").val(telefone);
   $("#tipoTelefone").val(tipoTelefone);
   $("#obsTelefone").val(obsTelefone);
                
   $("#nomeLiTel").val("#telefone_"+idtel+"_"+idtelbd);
   $('#telefone').focus();
     
}


function excluirTelefone(link){
    if ( window.confirm( "Deseja realmente excluir?" ) ){
        var idtel  = $(link).closest("tr").find("#idTel").val(); 
        var idtelbd = $(link).closest("tr").find("#idTelbd").val();
        
       $("#tabelaTelefone").append("<input type='hidden' name='excluidos[]' id='excluidos' value='"+idtelbd+"' />");  
    
        $(link).closest("tr").remove();
        
        var total = $("#totalTelefone").val();
        var diminuir=((parseFloat(total))-(parseFloat(1)));
        $("#totalTelefone").val(parseInt(diminuir));
        $("#nomeLiTel").val(""); 


    }else{
        window.location.href=url;
    } 
    
}

function up(lstr){ // converte minusculas em maiusculas

    var str=lstr.value; //obtem o valor
    lstr.value=str.toUpperCase(); //converte as strings e retorna ao campo
}
