<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 08.11.18
 * Time: 22:22
 */
header("Content-type: text/plain");
$headers = getallheaders();

print_r($headers);
print_r($_SERVER);

