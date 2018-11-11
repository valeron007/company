<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 11.11.18
 * Time: 15:26
 */

require "sypexgeo/SxGeo.php";

$ip = "85.26.184.27";

$geo = new SxGeo('SxGeoCity.dat');

//$country = $geo->getCountry($ip);
//$city = $geo->getCity($ip);

var_dump($geo->getCityFull($ip));
var_dump($geo->getCity($ip));
var_dump($geo->getCountry($ip));

//unset($geo);


