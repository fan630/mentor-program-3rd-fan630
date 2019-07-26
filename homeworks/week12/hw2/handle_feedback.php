<?php
    require_once('./conn.php');
    include("./Check_token.php");
    include("./utils.php");

    if(!isset($_POST['content'])|| empty($_POST['content'])||!isset($_POST['nickname'])|| empty($_POST['nickname'])){
        printMessage('請在空格中輸入資料!','./index.php');
    }else{
        $parent_id = $_POST['parent_id'];
        $feedback_content = $_POST['content'];
        $nickname = $_POST['nickname'];
    
        $stmt = $conn->prepare("INSERT INTO fan630_comments(parent_id, username, nickname, content) VALUES (?,?,?,?)");
        $stmt -> bind_param('ssss',$parent_id, $username, $nickname, $feedback_content);
    
        if($stmt -> execute()){
            //echo('執行成功!');
            header('Location:./index.php');
        }else{
            echo ('failed2:'. $conn->connect_error);   
        }
    }

?>