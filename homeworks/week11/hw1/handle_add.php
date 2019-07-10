<?php
    require_once('./conn.php');

    // $error_message = '';

    /*確認是否沒有通行證和是否留言為空白*/
    if(!isset($_COOKIE['member_id'])||empty($_POST['content']))
        {
            echo "<script>alert('請輸入留言！')</script>";
            header('Location:./index.php');
        }
          else
        {
          $token = $_COOKIE['member_id'];
          $content = $_POST['content'];

          $sql_CheckToken="SELECT * FROM fan630_certificate WHERE id = '$token' ";

        /*檢查通行證是否正確*/
          $result_CheckToken = $conn->query($sql_CheckToken); 

        /*正確才把留言加入到comments中*/
            if($result_CheckToken->num_rows > 0){
                while($row_CheckToken = $result_CheckToken->fetch_assoc()){
                        $username = $row_CheckToken['username'];
                        $sql = "INSERT INTO fan630_comments(username,content) VALUES ('$username','$content')";
                        $result= $conn->query($sql);
                
                        if($result){
                            header('Location:./index.php');
                        }else{
                            echo ('failed:'. $conn->error);   
                    }
                }
               }else{
                    echo "<script>alert('發生錯誤')</script>";
                    header('Location:./index.php');
               }
            }                
        

?>






