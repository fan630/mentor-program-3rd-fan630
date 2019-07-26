<?php

    require_once('./conn.php');
    include_once('Check_token.php');
    include("./utils.php");

    if(!isset($_POST['content'])|| empty($_POST['content'])){
        printMessage('請輸入留言!','./index.php');
    }else{
        $token = $_COOKIE['member_id'];
        $content = $_POST['content'];
        $parent_id = $_POST['parent_id'];
        $nickname= $_POST['nickname'];
    
        $stmt = $conn->prepare("INSERT INTO fan630_comments(username,content,parent_id, nickname) VALUES (?,?,?,?)");
        $stmt -> bind_param('ssss',$username, $content, $parent_id, $nickname);
    
        if($stmt -> execute()){
            header('Location:./index.php');
        }else{
            echo ('failed2:'. $conn->error);   
        }
    }
?>






