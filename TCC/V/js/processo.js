function adicionaLinha(clique,nome){
	$(clique).closest('.lisFormVert').children('li').css('background','none');	
	var linhavelha = $(clique).closest('li'); //Identifica a linha inicial com "+" do lado.
	if ($(clique).closest('.lisFormVert').find('input:not(:radio,:checkbox,:hidden,.descricaoNObrg)[value=""],select[value=""],textarea[value=""],input(:radio,:checkbox)[checked="false"]').length > 0 ) {
	    //$(clique).closest('.lisFormVert').find('input:not(:radio,:checkbox,:hidden)[value=""],select[value=""],textarea[value=""],input(:radio,:checkbox)[checked="false"]').closest('li').css('background','red');
		alert('existem campos vazios, preencha-os ou delete-os');
		return;
	}
	var linhanova = $(linhavelha).clone(); //Identifica a linha criada.
	$(linhavelha).find('.adicionaCampo').each(function(){
		var idvelho = $(this).attr('id'); //Identifica o id do campo dentro da linha inicial.
		var idpuro = idvelho.split('_');
		if (idvelho.indexOf('_') > -1) { //Se o id velho tiver um ponto,
			var idnovo = idpuro[0]+'_'+(parseInt(idpuro[1])+1); //separa-se o número da palavra e soma-se 1.
		} else { //Se não tiver ponto,
			var idnovo = idpuro[0]+'_'+(parseInt(idpuro[1])+1); //o número seguinte é o 2.
		}
		$(linhanova).find('#'+idvelho).attr('id',idnovo).val(''); //A cada campo dentro da linha clonada,
                $(linhanova).find('#'+idnovo).attr('name',idnovo);
                $(linhavelha).find('#'+idvelho).attr('name',idvelho);
                $("#contador"+nome).val((parseInt(idpuro[1])+1));
	});
	$(linhavelha).after(linhanova); //Imprime a linha criada.
	
       // $(clique).closest('.lisFormIcon').find('a.botaoMais').toggle(); //Esconde o "+" e mostra o "-" na linha velha.
        
        $(clique).closest('.lisFormColPeq').find('a.botaoMais').css('display','none');   
       
        if($(clique).closest('li').is('.lisFormVert li:last-child')){
            $(clique).closest('.lisFormVert').find('li:last-child').prev().find('a.botaoMais').css('display','inline');
        } else{
            $(clique).closest('.lisFormVert').find('li:last-child').find('a.botaoMais').css('display','inline');
        }

}

function removeLinha(clique){
    
    
    
    if($(clique).closest('li').is('.lisFormVert li:last-child')){
        if($(".lisFormVert li ").length > 1){
            $(clique).closest('.lisFormVert').find('li:last-child').prev().find('a.botaoMais').css('display','inline');  
            $(clique).closest('li').remove();
            $("#contador"+nome).val($("#contador"+nome).val()-1);
        }
    }else{
        $(clique).closest('li').remove();
        if($(".lisFormVert li ").length == 1){
            $(clique).closest('.lisFormColPeq').find('a.botaoMais').css('display','inline');   
        }
        $("#contador"+nome).val($("#contador"+nome).val()-1);
    }
}