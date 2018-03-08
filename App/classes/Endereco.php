<?php

namespace App\classes;

use App\conn\Conn;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Endereco
{
	public static function listEstados($like)
	{
		try {
			$like = '%' . $like . '%';
			$pdo = Conn::connect();
			$sql = 'SELECT Estado.Nome, Estado.Uf FROM Estado WHERE Estado.Nome LIKE :search';
			$stmt = $pdo->prepare($sql);

			$stmt->bindValue(':search', $like);
			$stmt->execute();
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (\PDOException $e){
			echo '<hr>';
			echo "Estamos com algum problema na conexão com o banco de dados. Avise o administrador.";
			echo '<hr>';

			$log = new Logger('Banco');
			$log->pushHandler(new StreamHandler('erros/banco.log', Logger::WARNING));

			$log->error('Error ao tentar conexão com banco de dados. Verifique a classe Endereco ou Conn --- Msg de erro: ' . $e->getMessage() . " --- arquivo: " . $e->getFile() . " linha: " . $e->getLine());
			die();
		}
	}

	public static function listCidades($estado, $like)
	{
		try {
			$like = '%' . $like . '%';
			$pdo = Conn::connect();
			$sql = 'SELECT Municipio.Nome FROM Municipio WHERE Uf = :uf AND Municipio.Nome LIKE :search';
			$stmt = $pdo->prepare($sql);


			$stmt->bindValue(':uf', $estado);
			$stmt->bindValue(':search', $like);

			$stmt->execute();
			return $stmt->fetchAll(\PDO::FETCH_ASSOC);
		} catch (\PDOException $e){
			echo '<hr>';
			echo "Estamos com algum problema na conexão com o banco de dados. Avise o administrador.";
			echo '<hr>';

			$log = new Logger('Banco');
			$log->pushHandler(new StreamHandler('erros/banco.log', Logger::WARNING));

			$log->error('Error ao tentar conexão com banco de dados. Verifique a classe Endereco ou Conn --- Msg de erro: ' . $e->getMessage() . " --- arquivo: " . $e->getFile() . " linha: " . $e->getLine());
			die();
		}
	}
}