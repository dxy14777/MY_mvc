<?php

class Login{

    // function Index(){
    //     //var_dump($_SESSION);die;
    //    if(!isset($_SESSION['user'])){
    //        var_dump($_SESSION);die;
    //         include 'view/login/login.html';
    //     }else{
    //         header('location:http://www.shi.com/index.php/home/index');
    //     }


    // }


    // /**
    //  * @desc 登录判断
    //  */
    // public function loginCheck(){
    //     $user = $_POST['User'];
    //     $pwd = $_POST['password_lifetime'];
    //     $result = $GLOBALS['db']->query('select User,password_lifetime from user where User = "'.$user.'" limit 1 ;')->fetchAll();
    //     //var_dump($result);die;
    //     if(!$result[0]){
    //         die('yong hu ming bu cun zai');
    //     }else{
    //         //$session['user'] = $user;
    //         $_SESSION['user'] =$user;
    //         header('location:http://www.shi.com/index.php/home/index');

    //     }


    // }

    function Index(){
        include 'view/login/login.html';
    }

}