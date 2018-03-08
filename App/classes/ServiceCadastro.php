<?php

namespace App\classes;

use App\conn\Conn;
use App\classes\Cadastro;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('Banco');
			$log->pushHandler(new StreamHandler('erros/banco.log', Logger::WARNING));


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
		try {
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
				echo json_encode(['status'=>false, 'msg'=>'Erro no banco. Contate o administrador.']);
				$log->error('Erro ao tentar inserir dados. verifique a classe ServiceCadastro ou Conn msg = ' . $this->db->errorInfo());
			die();
			}

		} catch (\PDOException $e){
			echo '<hr>';
			echo "Estamos com algum problema na conexão com o banco de dados. Avise o administrador.";
			echo '<hr>';

			$log = new Logger('Banco');
			$log->pushHandler(new StreamHandler('erros/banco.log', Logger::WARNING));

			$log->error('Error ao tentar conexão com banco de dados. Verifique a classe ServiceCadastro ou Conn --- Msg de erro: ' . $e->getMessage() . " --- arquivo: " . $e->getFile() . " linha: " . $e->getLine());
			die();
		}
	}
}
