<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/7
 * Time: 19:00
 */

class Account{
    function index(){
        $show_database = $GLOBALS['db']->query('show databases')->fetchAll();
        include 'view/account/index.html';
    }

    /**
     * @desc 数据库下的所有表
     */
    function getTable(){
        $database= $_GET['database'];
        $GLOBALS['db']->query("use $database");
        $result = $GLOBALS['db']->query('show tables')->fetchAll();
        $string=json_encode($result);
        $str=  str_replace($database,'name',$string);
        $res = json_decode($str,true); //如果没有true 默认转成对象
        //var_dump($res);die;
        include 'view/home/tableList.html';
    }


    /**
     * @desc 每个表对应的字段和索引
     */
    function getFieldIndex(){
        $database = $_GET['database'];
        $table = $_GET['table'];
        include 'view/home/fieldIndex.html';
    }

    /**
     * @desc 获取每个表所对应的字段名
     */
    function getFieldList(){
        $database = $_GET['database'];
        $table = $_GET['table'];
        $sql = $GLOBALS['db']->query("desc $database.$table;")->fetchAll();

        //var_dump($sql);die;
        include "view/home/field.html";
    }
    /**
     * @desc 获取每个字段的索引
     */
    function getIndexList(){
        $database = $_GET['database'];
        $table = $_GET['table'];
        //show index from table_name（表名） 查看表索引
        $sql = $GLOBALS['db']->query("show index from $database.$table;")->fetchAll();

        //var_dump($sql);die;
        include "view/home/sy.html";
    }


    /**
     * @desc 点击数据库名 获取下边所有的表
     */
    public function showTable()
    {
        $database=$_GET['database'];//获取数据库
        $GLOBALS['db']->query("use $database");
        $res = $GLOBALS['db']->query("show tables")->fetchAll();//获取所有表
        $string =json_encode($res);
        $string= str_replace($database,'name',$string);
        $result=json_decode($string,true);
        include 'view/showtable/showTable.html';
    }


    /**
     * @desc 进入新建表的页面
     */
    function newTable(){
        $database = $_GET['database'];
        include "view/addtable/addtable.html";
    }

    function selectTable(){
        $database = $_GET['database'];
        $table = $_GET['table'];
        $sql = $GLOBALS['db']->query("select * from  $database.$table")->fetchAll();
        include "view/select/index.html";
    }


}