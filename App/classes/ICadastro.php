<?php

namespace App\classes;

interface ICadastro
{
	public function validaNome();
	public function validaEmail();
	public function validaTelefone();
	public function validaCelular();
	public function validaWpp();
	public function validaEstado();
	public function validaCidade();
	public function validaMensagem();
}