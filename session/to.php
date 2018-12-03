<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/3
 * Time: 12:32
 */
session_id($_REQUEST['sid']);
session_start();
$sid = session_id();
$xx = $_SESSION['xx'];