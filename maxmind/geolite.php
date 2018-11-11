<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 11.11.18
 * Time: 16:03
 */

require '../vendor/autoload.php';

use GeoIp2\Database\Reader;

$reader = new Reader('GeoLite2-City.mmdb');

$record = $reader->city('188.162.166.73');

echo $record->country->isoCode . "<br>";
echo $record->country->name . "<br>";
echo $record->city->name . "<br>";
echo $record->city->geonameId . "<br>";
echo $record->postal->code . "<br>";


