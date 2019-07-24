<?php
    require_once("./conn.php");
    include("./Check_token.php");
    include_once('./utils.php');
    
    $id = $_GET['id'];
    
    $stmt=$conn->prepare("DELETE FROM fan630_comments WHERE username =? and id =?");
    $stmt->bind_param("ss",$username,$id);
    $stmt->execute();

    if($stmt->execute()){
        $parent_id = $_GET['id'];
        $stmt=$conn->prepare("DELETE FROM fan630_comments WHERE username =? and parent_id =?");
        $stmt->bind_param("ss",$username,$id);
        $stmt->execute();
        header('Location:./index.php');
    }else{
        printmessage('錯誤!','./index.php');
    }
?>