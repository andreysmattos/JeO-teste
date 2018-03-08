<?php

namespace App\classes;
use App\conn\Conn;

class Endereco
{
	public static function listEstados($like)
	{
		$like = '%' . $like . '%';
		$pdo = Conn::connect();
		$sql = 'SELECT Estado.Nome, Estado.Uf FROM Estado WHERE Estado.Nome LIKE :search';
		$stmt = $pdo->prepare($sql);

		$stmt->bindValue(':search', $like);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public static function listCidades($estado, $like)
	{
		$like = '%' . $like . '%';
		$pdo = Conn::connect();
		$sql = 'SELECT Municipio.Nome FROM Municipio WHERE Uf = :uf AND Municipio.Nome LIKE :search';
		$stmt = $pdo->prepare($sql);
		

		$stmt->bindValue(':uf', $estado);
		$stmt->bindValue(':search', $like);

		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}