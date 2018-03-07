<link href="../src/css/bootstrap.min.css" rel="stylesheet">

<?php

require_once "../../vendor/autoload.php";

//echo $_POST['cidade'];

$sigla = filter_input(INPUT_POST, 'cidade');

if(mb_strlen($sigla) > 2){
	//USUARIO MAL INTENCIONADO! REPORTAR NO MONOLOG
	die();
}

$cidades = App\classes\Endereco::listCidades($sigla);

echo '<label for="cidade">Cidade</label><select class="custom-select" id="cidade" name="cidade">';

foreach($cidades as $cidade){
	echo '<option value="'. $cidade['Nome']. '">'.$cidade['Nome'].'</option>';

}





echo '</select>';
