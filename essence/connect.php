<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 07.10.18
 * Time: 23:35
 */

class Connect
{
	private static $pdo = null;
	private static $user = 'root';
	private static $host = 'localhost';
	private static $password = 'rfk,fcf';
	private static $dbanme = 'company';
	private $connection;

	private function __construct()
	{
		$this->connection = new PDO(
			'mysql:host='.
			self::$host .
			';dbname=' .
			self::$dbanme,
			self::$user,
			self::$password,
			[PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
		);

	}

	private function __clone () {}
	private function __wakeup () {}

	public static function getInstance()
	{
		if (self::$pdo != null) {
			return self::$pdo;
		}

		return self::$pdo = new Connect();
	}

	public function getConnection(){
		return $this->connection;
	}

}

