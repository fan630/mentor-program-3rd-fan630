<?php
    require_once("./conn.php");
    $id = $_GET["id"];
    $sql = "DELETE FROM fan630_comments where id='$id'";
    $result= $conn->query($sql);

    if($result){
        header('Location:./index.php');
    }else{
        die ('failed:'. $conn->error);
    }
?>