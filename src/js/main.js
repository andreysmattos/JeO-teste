$(function(){


	$('#telefone').mask('(000) 0000-0000');
	$('#celular').mask('(000) 0000-00000');

	$('#valida').submit(function(){
		//serialize pega todo conteúdo do formulario e salva na variavel
		var form = $(this).serialize();

		
		var valida = $.ajax({
		url: 'App/script/valida.php',
		method: 'post',
		data: form
		//dataType: 'json'
		})


		valida.done(function(e){
			console.log(e)
			if(e.status){
				$('#msg').html('<div class="alert alert-success"> Cadastrado com sucesso.</div>.')
			} else {
				$('#msg').html('<div class="alert alert-danger"> <strong>Atenção!</strong> '+e.msg+'</div>')
			}
			
		})


		//retorna falso para que a página não seja atualizada ao dar submit no formulario
		return false;
	});
	
	
	$('#estado').change(function(){
		var sigla = $(this).val();

		var cidade = $.ajax({
			url: 'App/script/cidade.php',
			method: 'post',
			data: {
				'cidade': sigla
			}
		})

		cidade.done(function(e){
			$('#city').html(e);
		})
	});



})