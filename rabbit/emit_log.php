<?php
/**
 * Created by PhpStorm.
 * User: valeron
 * Date: 07.11.18
 * Time: 13:39
 */

namespace Acme\AmqpWrapper;

require_once '/home/valeron/pelmen/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPConnection('localhost', 80, 'valeron', 'rfk,fcf');

$channel = $connection->channel();

$channel->exchange_declare('logs', 'fanout', false, false, false);

$data = implode(' ', array_slice($argv, 1));
if(empty($data)) $data = "info: Hello World!";
$msg = new AMQPMessage($data);

$channel->basic_publish($msg, 'logs');

echo " [x] Sent ", $data, "\n";

$channel->close();
$connection->close();



