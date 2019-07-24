<?php
    require_once('./conn.php');
    include_once('./utils.php');
    
    $token = $_COOKIE['member_id'];
    $sql = "DELETE FROM fan630_certificate WHERE id = ? ";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param("s",$token);
    
    if($stmt->execute()){
        setcookie("member_id", "", time()+3600*24);
        printMessage('你已成功登出!', './index.php');
    }else{
        die('!');
    }

?>