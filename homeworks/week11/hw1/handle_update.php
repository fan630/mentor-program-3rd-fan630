<?php
    require_once("./conn.php");
    /*確認是否沒有通行證*/
    if(!isset($_COOKIE['member_id']))
        {
          echo "<script>alert('發生錯誤')</script>";
          header('Location:./login.php');
        }
          else
        {
          $token = $_COOKIE['member_id'];
          $content = $_POST['content'];
          $id = $_POST['id'];

          $sql_CheckToken="SELECT * FROM fan630_certificate WHERE id = '$token' ";

        /*檢查通行證是否正確*/
          $result_CheckToken = $conn->query($sql_CheckToken); 

        /*正確才把留言加入到comments中*/
            if($result_CheckToken->num_rows > 0){
                while($row_CheckToken = $result_CheckToken->fetch_assoc()){
                        $username = $row_CheckToken['username'];
                        $sql = "UPDATE fan630_comments SET content = '$content' WHERE username ='$username' and id ='$id' "; 
                        //echo($sql);
                        $result= $conn->query($sql);
                        if($result){
                            header('Location:./index.php');
                        }else{
                            echo ('failed:'. $conn->error);
                        }   
                }
               }else{
                    echo "<script>alert('發生錯誤')</script>";
                    header('Location:./login.php');
               }
            }                

?>