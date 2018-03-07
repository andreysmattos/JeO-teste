<?php
require_once "../../vendor/autoload.php";

use App\classes\Cadastro;
use App\classes\Endereco;


echo json_encode($_POST);
die();

$c = new Cadastro;

//Optei por não usar o metodo construtor, acho que assim o código fica mais legível
$c->setNome(filter_input(INPUT_POST, 'nome'))
  ->setEmail(filter_input(INPUT_POST, 'email'))
  ->setTelefone(filter_input(INPUT_POST, 'telefone'))
  ->setCelular(filter_input(INPUT_POST, 'celular'))
  ->setWpp(filter_input(INPUT_POST, 'contatoWpp'))
  ->setEstado(filter_input(INPUT_POST, 'estado'))
  ->setCidade(filter_input(INPUT_POST, 'cidade'))
  ->setMensagem(filter_input(INPUT_POST, 'mensagem'));

print_r();

