function mostraCpfCnpj(valor){
    if(valor == "F"){
        $("#habilitaFisica").show();
        $("#habilitaJuridica").hide();
    }

    if(valor == "J"){
        $("#habilitaFisica").hide();
        $("#habilitaJuridica").show();
    }
    if(valor == ""){
        $("#habilitaFisica").hide();
        $("#habilitaJuridica").hide();
    }
}
function adicionaEndereco(){
    if($("#endereAutor").val() != ""){
        var nomeLiEnd = $("#nomeLiEnd").val();
        var idEnd ="";
        if(nomeLiEnd == ""){
            var total = $("#totalEndereco").val();
            if(total == ""){
                total =0;
            }
            var Soma=((parseFloat(total))+(parseFloat(1)));
            $("#totalEndereco").val(parseInt(Soma));
            idEnd[1] = Soma;
        }else{
            idEnd =  nomeLiEnd.split("_");
            $(nomeLiEnd).html(" ");
        }
        var endAutor =  $("#endereAutor").val();
        var compAutor = $("#complemento").val();
        var cepAutor = $("#cep").val();
        var bairroAutor = $("#bairro").val();
        var cidadeAutor = $("#cidade").val();
        var estadoId = $("#uf").val();
        var estadoNome = $("#"+estadoId).text();
        var numeroAutor = $("#numero").val();
        var valor = "";
        if ($("#efetivoEnd").attr('checked')){
            valor = 'S';
        }else{
            valor = 'N';
        }
        var obs = $("#obsEnd").val();
      
        var tr =
            "<td>"+endAutor+"</td>"+
            "<td>"+numeroAutor+"</td>"+
            "<td>"+compAutor+"</td>"+
            "<td>"+bairroAutor+"</td>"+
            "<td>"+cepAutor+"</td>"+
            "<td>"+cidadeAutor+"</td>"+
            "<td>"+estadoNome+"</td>"+
            "<td>"+valor+"</td>"+
            "<td>"+obs+"</td>"+
            "<td><a href='#' id="+idEnd[1]+" onclick='editarEndereco(this);'><i class='icon-edit'></i></a>"+
                "<a href='#' id="+idEnd[1]+" onclick='excluirEndereco(this);'><i class='icon-trash'></i></a></td>"+
            "<input type='hidden' name='endeAutor[]' id='endeAutor' value='"+endAutor+"' />"+
            "<input type='hidden' name='complementoAutor[]' id='complementoAutor' value='"+compAutor+"' />"+
            "<input type='hidden' name='numeroAutor[]' id='numeroAutor' value='"+numeroAutor+"' />"+
            "<input type='hidden' name='cepAutor[]' id='cepAutor' value='"+cepAutor+"' />"+
            "<input type='hidden' name='bairroAutor[]' id='bairroAutor' value='"+bairroAutor+"' />"+
            "<input type='hidden' name='cidadeAutor[]' id='cidadeAutor' value='"+cidadeAutor+"' />"+
            "<input type='hidden' name='ufAutor[]' id='ufAutor' value='"+estadoId+"' />"+
            "<input type='hidden' name='efeEnd[]' id='efeEnd' value='"+valor+"' />"+
            "<input type='hidden' name='obsEnd[]' id='obsEnd' value='"+obs+"' />"+
            "<input type='hidden' name='idEnd[]' id='idEnd' value='"+idEnd[1]+"' />";

        if(nomeLiEnd == ""){
            $("#tabelaEndereco").append("<tr id='endereco_"+idEnd[1]+"'>"+tr+"</tr>");
        }else{
            $(nomeLiEnd).html(tr);
        }
        


        $("#endereAutor").val(" ");
        $("#complemento").val(" ");
        $("#cep").val(" ");
        $("#bairro").val(" ");
        $("#cidade").val(" ");
        $("#uf").val(" ");
        $("#obsEnd").val(" ");
        $("#numero").val(" ");
        $("#efetivoEnd").attr('checked',false);
        $("#nomeLiEnd").val(" ")

        $("#enderecos").show();
    }else{
        alert("Escreva o Endereço para adicionar");
        $("#endereAutor").focus();
    }
    // $('#end').clone().insertAfter('#end');
}

function excluirEndereco(link){

    if ( window.confirm( "Deseja realmente excluir?" ) ){
        var idEnde = $(link).attr("id");
    
        $.post('desativarEndereco.php', {
            end: idEnde},
            function(resposta){
            //Tratamento dos dados de retorno
            }, "html"
        );
    
        $(link).closest("tr").remove();
        
        var total = $("#totalEndereco").val();
        var diminuir=((parseFloat(total))-(parseFloat(1)));
        $("#totalEndereco").val(parseInt(diminuir));
        
    }else{
        window.location.href=url;
    } 
    
}

function editarEndereco(link){
    
    var idEnd = $(link).attr("id");

    var endAutor =  $(link).closest("tr").find("#endeAutor").val();
    var compAutor = $(link).closest("tr").find("#complementoAutor").val();
    var cepAutor = $(link).closest("tr").find("#cepAutor").val();
    var numeroAutor = $(link).closest("tr").find("#numeroAutor").val();
    var bairroAutor = $(link).closest("tr").find("#bairroAutor").val();
    var cidadeAutor = $(link).closest("tr").find("#cidadeAutor").val();
    var estadoId = $(link).closest("tr").find("#ufAutor").val();
    var efetivoEnd = $(link).closest("tr").find("#efeEnd").val();
    var obsEnd = $(link).closest("tr").find("#obsEnd").val();
    
   
    $("#endereAutor").val(endAutor);
    $("#complemento").val(compAutor);
    $("#cep").val(cepAutor);
    $("#bairro").val(bairroAutor);
    $("#cidade").val(cidadeAutor);
    $("#uf").val(estadoId);
    $("#numero").val(numeroAutor);
    $("#obsEnd").val(obsEnd);
      
    if(efetivoEnd == 'S')
       $("#efetivoEnd").attr('checked','checked');
           
     $("#nomeLiEnd").val("#endereco_"+idEnd);    
    
    //$("#endereco_"+idEnd).html(tr);
        
    
}
     
function adicionaTelefone(){
    if($("#telefoneAutor").val() != ""){
        var nomeLitel = $("#nomeLiTel").val();
        var idtel ="";
        if(nomeLitel == ""){
            var total = $("#totalTelefone").val();
            if(total == ""){
                total =0;
            }
            var Soma=((parseFloat(total))+(parseFloat(1)));
            $("#totalTelefone").val(parseInt(Soma));
            idtel[1] = Soma;
        }else{
            idtel =  nomeLitel.split("_");
            $(nomeLitel).html(" ");
        }
         
        var telefone =  $("#telefoneAutor").val();
        var idTipoTelefone = $("#tipoTelefone").val();
        var tipoTelefone = $("#tel_"+idTipoTelefone).text();
        var valor = "";
        if ($("#efetivoTel").attr('checked')){
            valor = 'S';
        }else{
            valor = 'N';
        }
        var obsTel = $("#obsTel").val();
        
        var tr =
            "<td>"+telefone+"</td>"+
            "<td>"+tipoTelefone+"</td>"+
            "<td>"+valor+"</td>"+
            "<td>"+obsTel+"</td>"+
            "<td><a href='#' id="+idtel[1]+" onclick='editarTelefone(this);'><i class='icon-edit'></i></a>"+
                 "<a href='#' id="+idtel[1]+" onclick='excluirTelefone(this);'><i class='icon-trash'></i></a></td>"+
            "<input type='hidden' name='telAutor[]' id='telAutor' value='"+telefone+"' />"+
            "<input type='hidden' name='tipoTelAutor[]' id='tipoTelAutor' value='"+idTipoTelefone+"' />"+
            "<input type='hidden' name='efetivoTel[]' id='efetivoTel' value='"+valor+"' />"+
            "<input type='hidden' name='obsTel[]' id='obsTel' value='"+obsTel+"' />"+
            "<input type='hidden' name='idTel[]' id='idTel' value='"+idtel[1]+"' />";

        if(nomeLitel == ""){
            $("#tabelaTelefone").append("<tr id='telefone_"+idtel[1]+"'>"+tr+"</tr>");
        }else{
            $(nomeLitel).html(tr);
        }
       
        $("#telefoneAutor").val(" ");
        $("#tipoTelefone").val(" ");
        $("#obsTel").val(" ");
        $("#efetivoTel").attr('checked',false);

        $("#telefones").show();
    }else{
        alert("Digite o Número do Telefone e Selecione o Tipo para adicionar!");
        $("#telefoneAutor").focus();
    }

    // $('#end').clone().insertAfter('#end');
}


function editarTelefone(link){
   var idtel = $(link).attr("id");
    
   var telefone  = $(link).closest("tr").find("#telAutor").val();
   var tipoTelefone  =  $(link).closest("tr").find("#tipoTelAutor").val();
   var obsTelefone =    $(link).closest("tr").find("#obsTel").val();
   var efetivoTEl =      $(link).closest("tr").find("#efetivoTel").val();
   
   $("#telefoneAutor").val(telefone);
   $("#tipoTelefone").val(tipoTelefone);
   $("#obsTel").val(obsTelefone);
   
   if(efetivoTEl == 'S')
       $("#efetivoTel").attr('checked','checked');
           
   $("#nomeLiTel").val("#telefone_"+idtel); 
}


function excluirTelefone(link){
    if ( window.confirm( "Deseja realmente excluir?" ) ){
        var idTel = $(link).attr("id");
    
        $.post('desativarTelefone.php', {
            tel: idTel},
            function(resposta){
            //Tratamento dos dados de retorno
            }, "html"
        );
    
        $(link).closest("tr").remove();
        
        var total = $("#totalTelefone").val();
        var diminuir=((parseFloat(total))-(parseFloat(1)));
        $("#totalTelefone").val(parseInt(diminuir));

    }else{
        window.location.href=url;
    } 
    
}