<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 15.10.18
 * Time: 1:34
 */
//function father($a){
//	echo $a . "<br>";
//	function child($b){
//		echo $b + 1 . "<br>";
//		return $b * $b;
//	}
//
//	return $a * $a * child($a);
//}
//
//father(10);
//child(30);
//
//$myEcho = function(...$str){
//	foreach ($str as $v){
//		echo "$v<br>\n";
//	}
//};

//function tabber($spaces, ...$planets){
//	$new = [];
//	foreach ($planets as $planet){
//		$new[] = str_repeat("&nbsp;", $spaces).$planet;
//	}
//	call_user_func("myEcho", $new);
//}
//
//tabber(10, "Меркурий", "Венера", "Земля", "Марс");


//$myEcho("Меркурий", "Венера", "Земля", "Марс");

$message = "Работа не может быть продолжена из-за ошибок:<br>";

$check = function (array $errors) use ($message)
{
	if(isset($errors) && count($errors) > 0){
		echo $message;
		foreach ($errors as $error){
			echo "$error<br>";
		}
	}
};

$check([]);

$errors[] = "Заполните имя пользователя";
$check($errors);

$message = "Список требований";
$errors = ["PHP", "MySql", "memcache"];
$check($errors);

function generator(){
	echo "перед первым yield";
	yield 1;
	echo "перед вторым yield";
	yield 2;
	echo "перед третим yield";
	yield 3;
}

foreach (generator() as $gen){
	echo "$gen<br>";
}


function collect($arr, $callback){
	foreach ($arr as $value){
		yield $callback($value);
	}
}

$arr = [1,2,3,4,5,6];

$collect = collect($arr, function($e){return $e * $e;});

foreach ($collect as $val){
	echo "$val  ";
}


//function sq($value){
//	yield $value * $value;
//}
//
//function even_square($arr){
//	foreach ($arr as $value){
//		if($value % 2 == 0){
//			yield from sq($value);
//		}
//	}
//}
//
//$arr = [1,2,3,4,5,6,7];
//
//foreach (even_square($arr) as $val)
//{
//	echo "$val   ";
//}

//echo "<br>";
//echo "dir====" . __DIR__;


