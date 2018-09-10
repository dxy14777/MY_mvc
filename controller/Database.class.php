<?php
class Database{

    function Index(){
        $show_database = $GLOBALS['db']->query('show databases')->fetchAll();
        // 数据库操作
        $GLOBALS['db']->query('use '.implode('',$show_database[0]));  //进入指定的数据库
        $sql = $GLOBALS['db']->query('select * from SCHEMATA;')->fetchAll();  //查询表的数据库名称和排序方式
        include 'view/database/index.html';
    }

    function table(){
        $database= $_GET['database'];
        $GLOBALS['db']->query("use $database");
        $result = $GLOBALS['db']->query('show tables')->fetchAll();
        $string=json_encode($result);
        echo str_replace($database,'name',$string);

    }

    function create(){
        $new_db = $_POST['new_db'];
        $db_collation = $_POST['db_collation'];
        $GLOBALS['db']->query("create database ".$new_db)->fetchAll();
        header('location:http://www.shi.com/index.php/database/index');


    }

}