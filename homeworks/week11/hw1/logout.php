<?php
    require_once('./conn.php');
    $token = $_COOKIE['member_id'];
    
    $sql = "DELETE FROM fan630_certificate WHERE id = '$token'";
    $result = $conn->query($sql);
    
    if($result){
        setcookie("member_id", "", time()+3600*24);
        header('Location:./index.php');
    }else{
        die('!');
    }

?>