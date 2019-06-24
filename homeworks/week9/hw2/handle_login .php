<?php
    require_once('./conn.php');

    if
    (
    isset($_POST['username'])&&
    isset($_POST['password'])&&
    !empty($_POST['username'])&&
    !empty($_POST['password'])
    ){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM fan630_users where username = '$username' and password ='$password'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            while($row = $result-> fetch_assoc()){
              setcookie("username",$username, time()+3600*24);
              header('Location:./index.php');
            }
        }else{
            echo ('請先完成註冊！');   
        }
    } 
    else{
        echo ('請輸入正確帳號密碼!!');
    }


     




    
?>  