<?php

require_once('./conn.php');

function setToken($conn, $username){
    $token = randPassId();
    $sql_giveToken = "INSERT INTO fan630_certificate (id, username) VALUES (?,?)";
    $stmt= $conn->prepare($sql_giveToken);
    $stmt -> bind_param("ss", $token, $username);
    $stmt -> execute();
    setcookie('member_id',$token, time()+3600*24);
}

function printMessage($msg, $redirect){
    echo '<script>';
    echo  "alert('$msg');";
    echo  "window.location='$redirect'";
    echo '</script>';
}



?>
