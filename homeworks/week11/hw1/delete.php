<?php
    require_once("./conn.php");
    $id = $_GET['id'];

    /*確認是否沒有通行證*/
    if(
        !isset($_COOKIE['member_id']))
    {
        echo "<script>alert('發生錯誤')</script>";
        header('Location:./login.php');
    }else{
        $token = $_COOKIE['member_id'];
        $content = $_POST['content'];

        $sql_CheckToken="SELECT * FROM fan630_certificate WHERE id = '$token' ";

        /*檢查通行證是否正確*/
        $result_CheckToken = $conn->query($sql_CheckToken); 

        /*正確才能把留言從comments中刪除*/
            if($result_CheckToken->num_rows > 0){
                while($row_CheckToken = $result_CheckToken->fetch_assoc()){
                        $username = $row_CheckToken['username'];
                        $sql = "DELETE FROM fan630_comments WHERE username ='$username' and id ='$id' ";
                        $result= $conn->query($sql);
                        if($result){
                            header('Location:./index.php');
                        }else{
                            die ('failed:'. $conn->error);
                        }
                }
               }else{
                    echo "<script>alert('發生錯誤')</script>";
                    header('Location:./login.php');
               }
            }  
?>