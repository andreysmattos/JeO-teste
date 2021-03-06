$(function(){


	$('#telefone').mask('(000) 0000-0000');
	$('#celular').mask('(000) 0000-00000');

	$('#valida').submit(function(){
		//serialize pega todo conteúdo do formulario e salva na variavel
		var form = $(this).serialize();

		
		var valida = $.ajax({
			url: 'App/script/valida.php',
			method: 'post',
			data: form,
			dataType: 'json'
		})


		valida.done(function(e){
			if(e.status){
				$('#msg').html('<div class="alert alert-success"> Cadastrado com sucesso.</div>.');
				$('#valida').each(function(){
					this.reset();
				});
				$("#cidade").select2('val', 'All');
				$("#estado").select2('val', 'All');
			} else {
				$('#msg').html('<div class="alert alert-danger"> <strong>Atenção!</strong> '+e.msg+'</div>')
			}
			
		})


		//retorna falso para que a página não seja atualizada ao dar submit no formulario
		return false;
	});


	$("#valida").validate({
		rules : {
			nome:{
				required:true,
				minlength:3
			},
			email:{
				required:true
			},
			mensagem:{
				required:true
			}                                 
		},
		messages:{
			nome:{
				required:"Por favor, informe seu nome.",
				minlength:"O Nome deve ter pelo menos 3 caracteres."
			},
			email:{
				required:"É necessário informar um email. ",
				minlength:"O Email deve ter pelo menos 6 caracteres."
			},
			mensagem:{
				required:"A mensagem não pode ficar em branco.",
				minlength:"A mensagem deve ter pelo menos 10 caracteres."
			},
			celular:{
				required:"O Celular não pode ficar em branco.",
				minlength:"O Celular deve ter pelo menos DDD 3 + 9 números."
			},
			telefone:{
				minlength:"O Telefone deve ter pelo menos DDD 3 + 9 números."
			},
			estado:{
				required:"É necessário informar um estado. "
			} /*,
			cidade:{
				required:"É necessário informar uma cidade. "
			}      */
		}
	});



	// CÓDIGO PARA O SELECT2

	$( "#estado" ).select2({        
    ajax: {
        url: "App/script/estado.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
    minimumInputLength: 1
});


$('#estado').change(function(){
		var sigla = $(this).val();
		$('#cidade').prop("disabled", false);
		
		$("#cidade").select2({        
    ajax: {
        url: "App/script/cidade.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term, // search term
                estado: sigla
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
    minimumInputLength: 1
});
		
	});


})