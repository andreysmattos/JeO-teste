<?php

namespace App\conn;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Conn
{
	public static function connect()
	{	try {		
		return new \PDO('mysql: host=localhost; dbname=jeo; charset=utf8', 'root', '');
		} catch (\PDOException $e){
			echo '<hr>';
			echo "Estamos com algum problema na conexão com o banco de dados. Avise o administrador.";
			echo '<hr>';

			$log = new Logger('Banco');
			$log->pushHandler(new StreamHandler('erros/banco.log', Logger::WARNING));

			$log->error('Error ao tentar conexão com banco de dados. Verifique a classe Conn --- Msg de erro: ' . $e->getMessage() . " --- arquivo: " . $e->getFile() . " linha: " . $e->getLine());
			die();
		}
	}
}