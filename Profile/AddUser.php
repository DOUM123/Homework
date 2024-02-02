<?php

    $username = $_POST["username"];
    $password = $_POST["password"];

    $link = mysqli_connect( 
        'localhost', 
        'root', 
        '', 
        'wanghexuan');

    //find data
    $res = mysqli_query($link, "SELECT username from user where username='$username' and password = '$password'");

    //no data can insert
    if($res->num_rows == 0){
        mysqli_query($link, "INSERT into user (username, password) values ('$username','$password') ");
        $f = "sign succeed!!";
    }else{
        $f = "sign failed!!";
    }

    include("AddUser.html");
?>