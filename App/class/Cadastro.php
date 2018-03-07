<?php

namespace class;

class Cadastro
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