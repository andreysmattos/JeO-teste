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

		echo json_encode(['status'=>true]);

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
		return true;
	}

	public function validaCelular()
	{
		if(!$this->getCelular()){
			echo json_encode(['status'=>false, 'msg'=>'Informe um Celular.']);
			die();
		}

		if(mb_strlen($this->getCelular()) <= 11){
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
		if(!$this->getCidade()){
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
		$this->telefone;
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