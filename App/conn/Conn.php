<?php

namespace Banco;

class Conn
{
	public static function connect
	{
		return new \PDO('mysql: host=localhost; dbname=jeo; charset=utf8', 'root', '');
	}
}