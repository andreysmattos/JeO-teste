<?php

require_once "../../vendor/autoload.php";



$resultado = App\classes\Endereco::listCidades($_GET['estado'],$_GET['q']);

foreach($resultado as $cidade){
	$json [] = ['id'=>$cidade['Nome'], 'text'=>$cidade['Nome']];
}

echo json_encode($json);