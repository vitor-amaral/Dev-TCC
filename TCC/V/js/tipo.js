$(document).ready(function(){
        $('#formTipoTela').validate({
            
            rules:{
                nomeTipo:{
                    required: true
                },
                tipoTela:{
                    required:true
                }
            }
        });
});


