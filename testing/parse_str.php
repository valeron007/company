<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 09.11.18
 * Time: 2:22
 */

$str = "sullivan=paul&names[roy]=noni&names[read]=tom";
parse_str($str, $out); //парсим query_string

echo "<pre>";
	print_r($out);
	print_r(parse_url('http://work.pelmen:80/testing/parse_str.php?name=valeron')); //парсим url
echo "</pre>";

