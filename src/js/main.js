$(function(){

	$('#valida').submit(function(){
		//serialize pega todo conteúdo do formulario e salva na variavel
		var form = $(this).serialize();

		
		var valida = $.ajax({
		url: 'script/valida.php',
		method: 'post',
		data: form,
		dataType: 'json'
		})


		valida.done(function(e){
			console.log(e);
		})


		//retorna falso para que a página não seja atualizada ao dar submit no formulario
		return false;
	});
	
	



})