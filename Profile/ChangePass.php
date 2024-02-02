<?php 
    session_start();

    $newP1 = $_POST["newP1"];
    $newP2 = $_POST["newP2"];

    $wid = $_SESSION["account"];


    if($newP1 == $newP2){
        $link = mysqli_connect( 
            'localhost', 
            'root', 
            '', 
            'wanghexuan');

        // 接続状況をチェックします
        if (mysqli_connect_errno()) {
            echo "データベースに接続できません:";
        } 

        $res = mysqli_query($link,"UPDATE user SET password='$newP1' WHERE username='$wid'");

        if($res){
            $e = "Password change succeed!!";
        }

    }else{
        $e = "Password do not match!!";
    }

    include("ChangePass.html");
?>