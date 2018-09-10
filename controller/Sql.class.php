<?php
class Sql{

    function index(){
        $show_database = $GLOBALS['db']->query('show databases')->fetchAll();

        include 'view/sql/sql.html';
    }

    function table(){
        $database= $_GET['database'];
        $GLOBALS['db']->query("use $database");
        $result = $GLOBALS['db']->query('show tables')->fetchAll();
        $string=json_encode($result);
        echo str_replace($database,'name',$string);
    }

}