<?php
    require_once('./conn.php');

    $content = $_POST['content'];
    $username = $_COOKIE['username'];

    $sql = "INSERT INTO comments(username,content) VALUES ('$username','$content')";

    $result= $conn->query($sql);

    if($result){
        header('Location:./index.php');
    }else{
        echo ('failed:' . $conn->error);
    }

?>