<?php

    session_start();

    $s="";
    $e="";
    $p="";
    $o="";

    if(isset($_POST["send"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        //link database
        $link = mysqli_connect( 
            'localhost', 
            'root', 
            '', 
            'wanghexuan');

        if (mysqli_connect_errno()) {
            return;
        }
        //Find username in database
        $res = mysqli_query($link, "select username from user where username = '$username' and password = '$password'");

        //if has jump, if no has return
        if($res->num_rows == 1){
            //login status = true
            $_SESSION["login_status"] = true;
            $_SESSION["account"] = $username;
            $s = "Login Succeed!!";
        }else{ 
            if($_SESSION["login_status"] == false)  
                $e = "No data found!!";
        }
    }
    //Login Out
    if(isset($_POST["out"])){
        $_SESSION["login_status"] = false;
    }

    //if Login Add button
    if($_SESSION["login_status"]){
        $p = "<a href='ChangePass.html'>ChangePassword</a>";
        $o = "<form ACTION='Login.php' method='post'><input type='submit' value='Logout' name='out'></form>";
    }
    

    include("Login.html");
?>