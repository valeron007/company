<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 09.11.18
 * Time: 1:41
 */

$counter = isset($_COOKIE['counter']) ? $_COOKIE['counter'] : 0;
$counter++;
setcookie("counter", $counter, 0x7fffffff);

echo "Вы запустили этот сценарий $counter раз(а)";


echo "<br>cookie:{$_COOKIE['name']}";


