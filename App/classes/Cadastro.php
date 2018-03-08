<?php

namespace App\classes;
use App\classes\ICadastro;

class Cadastro implements ICadastro
{
	//Atributos
	private $nome;
	private $email;
	private $telefone;
	private $celular;
	private $wpp;
	private $estado;
	private $cidade;
	private $mensagem;

	//Metodos

	public function validaDados()
	{

		$this->validaNome();
		$this->validaEmail();
		$this->validaTelefone();
		$this->validaCelular();
		$this->validaWpp();
		$this->validaEstado();
		$this->validaCidade();
		$this->validaMensagem();

		// Atenção: se você NÃO deseja sanitizar os dados é só apagar a linha abaixo
		$this->sanitize();

		
		return true;

	}

	public function validaNome()
	{
		if(!$this->getNome()){
			echo json_encode(['status'=>false, 'msg'=>'Informe um Nome']);
			die();
		}

		if(mb_strlen($this->getNome()) <= 2){
			echo json_encode(['status'=>false, 'msg'=>'Informe um Nome com mais de 2 caracteres.']);
			die();
		}
	}

	public function validaEmail()
	{
		if(!$this->getEmail()){
			echo json_encode(['status'=>false, 'msg'=>'Informe um Email.']);
			die();
		}

		if(!filter_var($this->getEmail(), FILTER_VALIDATE_EMAIL)){
			echo json_encode(['status'=>false, 'msg'=>'O Email informado não é Valido.']);
			die();
		}

		if(mb_strlen($this->getEmail()) <= 6){
			echo json_encode(['status'=>false, 'msg'=>'Informe um Email com mais de 6 caracteres.']);
			die();
		}

		return true;

	}

	public function validaTelefone()
	{
		if(mb_strlen($this->telefone) > 1 && mb_strlen($this->getTelefone()) <= 13){
			echo json_encode(['status'=>false, 'msg'=>'Informe um Telefone com mais de 11 caracteres.']);
			die();
		}
		return true;
	}

	public function validaCelular()
	{
		if(!$this->getCelular()){
			echo json_encode(['status'=>false, 'msg'=>'Informe um Celular.']);
			die();
		}

		if(mb_strlen($this->getCelular()) <= 14){
			echo json_encode(['status'=>false, 'msg'=>'Informe um Celular com mais de 11 caracteres. Incluindo DDD. No formato (051) 0000-0000']);
			die();
		}
		return true;
	}

	public function validaWpp()
	{

		if(!$this->getWpp()){
			echo json_encode(['status'=>false, 'msg'=>'Informe se deseja receber dados via Wpp.']);
			die();
		}

		$this->wpp = ($this->wpp == 's') ? 1 : 0;

		return true;
	}

	public function validaEstado()
	{
		if($this->getEstado() === 'false'){
			echo json_encode(['status'=>false, 'msg'=>'Informe um Estado.']);
			die();
		}
		return true;
	}

	public function validaCidade()
	{
		if($this->getCidade() === 'false'){
			echo json_encode(['status'=>false, 'msg'=>'Informe uma Cidade.']);
			die();
		}
		return true;
	}

	public function validaMensagem()
	{
		if(!$this->getMensagem()){
			echo json_encode(['status'=>false, 'msg'=>'Informe uma Mensagem.']);
			die();
		}

		if(mb_strlen($this->getMensagem()) <= 10){
			echo json_encode(['status'=>false, 'msg'=>'Informe uma mensagem de pelo menos 10 caracteres.']);
			die();
		}
		return true;
	}



	public function sanitize()
	{
		$this->setNome(filter_var($this->nome, FILTER_SANITIZE_SPECIAL_CHARS))
		->setEmail(filter_var($this->email, FILTER_SANITIZE_SPECIAL_CHARS))
		->setTelefone(filter_var($this->telefone, FILTER_SANITIZE_SPECIAL_CHARS))
		->setCelular(filter_var($this->celular, FILTER_SANITIZE_SPECIAL_CHARS))
		->setWpp(filter_var($this->wpp, FILTER_SANITIZE_SPECIAL_CHARS))
		->setEstado(filter_var($this->estado, FILTER_SANITIZE_SPECIAL_CHARS))
		->setCidade(filter_var($this->cidade, FILTER_SANITIZE_SPECIAL_CHARS))
		->setMensagem(filter_var($this->mensagem, FILTER_SANITIZE_SPECIAL_CHARS));
	}


	//Getters
	public function getNome()
	{
		return $this->nome;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}

	public function getCelular()
	{
		return $this->celular;
	}

	public function getWpp()
	{
		return $this->wpp;
	}

	public function getEstado()
	{
		return $this->estado;
	}

	public function getCidade()
	{
		return $this->cidade;
	}

	public function getMensagem()
	{
		return $this->mensagem;
	}

	//Setters
	//Retorna o $this para que possamos fazer isso $exemplo->setNome('andrey')->setEmail('andrey@andrey');
	public function setNome($nome)
	{
		$this->nome = $nome;
		return $this;
	}

	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	public function setTelefone($tel)
	{
		$this->telefone = $tel;
		return $this;
	}

	public function setCelular($cel)
	{
		$this->celular = $cel;
		return $this;
	}

	public function setWpp($wpp)
	{
		$this->wpp = $wpp;
		return $this;
	}

	public function setEstado($estado)
	{
		$this->estado = $estado;
		return $this;
	}

	public function setCidade($cidade)
	{
		$this->cidade = $cidade;
		return $this;
	}

	public function setMensagem($mensagem)
	{
		$this->mensagem = $mensagem;
		return $this;
	}
}