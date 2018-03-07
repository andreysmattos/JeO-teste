<?php

namespace App\classes;

use App\conn\Conn;
use App\classes\Cadastro;


class ServiceCadastro implements IServiceCadastro
{
	//Atributos
	private $db;
	private $cadastro;

	//Metodos
	public function __construct(ICadastro $cadastro)
	{
		$this->db = Conn::connect();
		$this->cadastro = $cadastro;
	}

	public function envia()
	{
		$sql = "INSERT INTO `cadastro` (nome, email, cidade, estado, mensagem) VALUES (:nome, :email, :cidade, :estado, :mensagem)";

		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':nome', $this->cadastro->getNome());
		$stmt->bindValue(':email', $this->cadastro->getEmail());
		$stmt->bindValue(':cidade', $this->cadastro->getCidade());
		$stmt->bindValue(':estado', $this->cadastro->getEstado());
		$stmt->bindValue(':mensagem', $this->cadastro->getMensagem());

		$stmt->execute();

		$id = $this->db->lastInsertId();

		$sql2 = "INSERT INTO `telefone` (telefone, celular, contatoWpp, id_cadastro) VALUES (:telefone, :celular, :contatoWpp, :id)";

		$stmt2 = $this->db->prepare($sql2);

		$stmt2->bindValue(':telefone', $this->cadastro->getTelefone());
		$stmt2->bindValue(':celular', $this->cadastro->getCelular());
		$stmt2->bindValue(':contatoWpp', $this->cadastro->getWpp());
		$stmt2->bindValue(':telefone', $this->cadastro->getTelefone());
		$stmt2->bindValue(':id', $id);

		$resultado = $stmt2->execute();

		if($resultado){
			echo json_encode(['status'=>true]);
		} else {
			//registra no monolog
			echo json_encode(['status'=>false, 'msg'=>'erro no banco']);
		}


	}
}
