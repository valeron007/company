<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 07.10.18
 * Time: 23:25
 */

try{
	$pdo = new PDO('mysql:host=localhost;dbname=company', 'root', 'rfk,fcf');
	echo 'Успешное подключение';
}catch (PDOException $exception){
	echo 'Не возможно одключиться к базе' . $exception->getMessage();
}



