<?php

require_once "../../vendor/autoload.php";



$resultado = App\classes\Endereco::listEstados($_GET['q']);

foreach($resultado as $estado){
	$json [] = ['id'=>$estado['Uf'], 'text'=>$estado['Nome']];
}

echo json_encode($json);