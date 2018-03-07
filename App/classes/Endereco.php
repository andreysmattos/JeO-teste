<?php

namespace App\classes;
use App\conn\Conn;

class Endereco
{
	public static function listEstados()
	{
		$pdo = Conn::connect();
		$sql = 'SELECT Estado.Nome, Estado.Uf FROM Estado';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public static function listCidades($estado)
	{
		$pdo = Conn::connect();
		$sql = 'SELECT Municipio.Nome FROM Municipio WHERE Uf = :uf';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':uf', $estado);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}