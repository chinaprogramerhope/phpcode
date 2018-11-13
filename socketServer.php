<?php
/**
 * Created by PhpStorm.
 * User: hxl
 * Date: 18-11-13
 * Time: 下午6:21
 */

set_time_limit(0);

$ip = '127.0.0.1';
$port = 3047;

// 创建一个ipv4 tcp socket
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or die('socket_create() fail:' . socket_strerror(socket_last_error()) . "\n");

// 阻塞模式
socket_set_block($sock) or die('socket_set_block() fail:' . socket_strerror(socket_last_error()) . "\n");

// 绑定到socket端口
$result = socket_bind($sock, $ip, $port) or die('socket_bind() fail:' . socket_strerror(socket_last_error()) . "\n");

// 开始监听
$result = socket_listen($sock, 4) or die('socket_listen() fail:' . socket_strerror(socket_last_error()) . "\n");

echo "\n" . 'bind socket on' . $ip . ':' . $port . "\n";

do { // never stop the daemon
    // 它接收连接请求并调用一个子连接socket来处理客户端和服务器间的信息
    $msgSock = socket_accept($sock) or die('socket_accept() failed, errMsg = ' . socket_strerror(socket_last_error()) . "\n");
    while (1) {
        // 读取客户端数据.  socket_read函数会一直读取客户端数据, 直到遇见\n, \t或者\0字符. php脚本把这些字符看作是结束符
        $buf = socket_read($msgSock, 1);
        echo 'client msg = ' . $buf . "\n";

        if ($buf == 'bye') {
            // 接受到结束消息, 关闭连接, 等待下一个连接
            socket_close($msgSock);
            continue;
        }

        // 数据传送 向客户端写入返回结果
        $msg = "welcome \n";
        socket_write($msgSock, $msg, strlen($msg)) or die('socket_write() failed, errMsg = ' . socket_strerror(socket_last_error()) . "\n");
    }
} while (true);
socket_close($sock);























