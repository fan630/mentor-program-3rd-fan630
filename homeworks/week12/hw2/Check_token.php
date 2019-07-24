<?php
    include_once('./conn.php');

    /*確認是否沒有通行證*/
    if(!isset($_COOKIE['member_id'])&& !empty($_COOKIE['member_id']))
        {
          header('Location:./login.php');
        }
          else
        {
          $token = $_COOKIE['member_id'];
          $sql_CheckToken="SELECT * FROM fan630_certificate WHERE id = ? ";
          $stmt = $conn->prepare($sql_CheckToken);
          $stmt -> bind_param("s",$token);
          $stmt -> execute();

        
        /*檢查通行證是否正確*/
          //$result_CheckToken = $conn->query($sql_CheckToken); 

        /*正確才把留言加入到comments中*/
            if($result_CheckToken = $stmt-> get_result()){
                while($row_CheckToken = $result_CheckToken->fetch_assoc()){
                      $username = $row_CheckToken['username'];
                }
               }else{
                    echo "<script>alert('發生錯誤')</script>";
               }
            }
?>