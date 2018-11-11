<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 08.11.18
 * Time: 20:05
 */

$i = 0;

begin:
$i++;
echo "$i<br>";
if($i >= 10){
	goto finish;
}
goto begin;
finish:

