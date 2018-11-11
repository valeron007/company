<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 09.11.18
 * Time: 14:55
 */


$path = session_save_path('/tmp/sessions');
session_name("VALERON");
session_start();

if(!isset($_SESSION['count'])){
	$_SESSION['count'] = 0;
}

$_SESSION['count'] = $_SESSION['count'] + 1;


?>

<h1>Счётчик</h1>
В текущей сессии вы открыли эту страницу
<?= $_SESSION['count']?> раз(а). <br>

Закройте браузер чтобы обнулить счётчик.<br>
<a href="<?= $_SERVER['SCRIPT_NAME']?>" target="_blank">Открыть дочернее окно браузера</a>
<br>
<h2>Path:<?= $path?></h2>

<?
echo "<pre>";
print_r($_SESSION);
print_r($_COOKIE);
print_r(__FILE__);

echo "</pre>";
?>

