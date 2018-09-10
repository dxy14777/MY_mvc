<?php
/**
 * 入口文件
 */

//如果pathinfo为空 直接跳到欢迎页面
if(empty($_SERVER['PATH_INFO'])) $_SERVER['PATH_INFO'] = 'Welcome/Index';

$pathInfo = $_SERVER['PATH_INFO'];  //将pathinfo存入变量
$pathInfo = ltrim($pathInfo,'/');  //去掉左边的斜线
$pathInfo = explode('/',$pathInfo);  //根据斜线将字符串转为数组
$pathInfo[0] = ucfirst($pathInfo[0]);
$pathInfo[1] = ucfirst($pathInfo[1]);
include 'common/db.class.php';
include 'vendor/db.class.php';
$GLOBALS['db']  = new db($config['db']);
session_start();

//// //定义__PUBLIC__变量
$host = $_SERVER['HTTP_HOST'];
define("__PUBLIC__",'http://'.$host.'/'.'public/');
//var_dump(__PUBLIC__);DIE;

include 'controller/'.$pathInfo[0].'.class.php';  //拼接进入控制器
@call_user_func_array($pathInfo,array());