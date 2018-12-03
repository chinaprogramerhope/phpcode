<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/3
 * Time: 12:32
 *
 * 通过url传递sid,
 * 目标页面session_id($_REQUEST['sid'])来达到使用同一个session的目的
 * 如果不使用sid, 第一次header到to.php, to.php收到的$_SESSION为空
 * 只要不关闭浏览器, 每次登录都是同一个session_id
 * todo 不重启浏览器, 改变session_id
 */
session_start();
$sid = session_id();
$_SESSION['x1'] = 'xx';
$_SESSION['x2'] = 'x2';

unset($_SESSION['x2']);

header('Location: http://127.0.0.1/to.php?sid=' . $sid);