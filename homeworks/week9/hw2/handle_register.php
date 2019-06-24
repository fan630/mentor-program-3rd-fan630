<?php
    require_once('./conn.php');

    if(
    //要透過isset和empty來判斷是否為空值
    isset($_POST['username'])&& 
    isset($_POST['password'])&&
    isset($_POST['nickname'])&&
    !empty($_POST['username'])&& 
    !empty($_POST['password'])&&
    !empty($_POST['nickname']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nickname = $_POST['nickname'];

        $sql = "INSERT INTO fan630_users (username,password,nickname) VALUES ('$username','$password','$nickname')";
        $result = $conn->query($sql);
        
        if($result){
            setcookie("username",$username, time()+3600*24);
            header('Location:./index.php');
        }else{
            echo ('failed:'. $conn->error);   
        }
    
    }else{
        echo '請輸入自定義帳號密碼!!';
    }

    


?>  