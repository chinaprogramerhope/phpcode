<?php
/**
 * Created by PhpStorm.
 * User: hxl
 * Date: 18-11-13
 * Time: 下午6:35
 */

set_time_limit(0);

$host = '127.0.0.1';
$port = 3047;
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die('could not create socket' . "\n");

$connection = socket_connect($socket, $host, $port) or die('could not connect server' . "\n");
socket_write($socket, 'hello socket') or die('write fail' . "\n");

while ($buff = socket_read($socket, 1024, PHP_NORMAL_READ)) {
    echo 'server say: ' . $buff . "\n";
    echo 'client say: ' . "\n";

    $content = fgets(STDIN);
    socket_write($socket, $content);
}

socket_close($socket);