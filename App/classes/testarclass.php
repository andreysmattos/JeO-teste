<?php
require_once "../../vendor/autoload.php";

use App\classes\Cadastro;
use App\classes\Endereco;



$c = new Cadastro;

//Optei por não usar o metodo construtor, acho que assim o código fica mais legível
//Não usei FILTER_SANITIZE pra manter a integridade dos dados, para evitar sql inject usei prepared statement
$c->setNome('teste')
  ->setEmail('teste')
  ->setTelefone('teste')
  ->setCelular('teste')
  ->setWpp('teste')
  ->setEstado('teste')
  ->setCidade('teste')
  ->setMensagem('""teste');


var_dump($c->getMensagem());
