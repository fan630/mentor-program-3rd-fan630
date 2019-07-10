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
        /*寫入註冊資訊*/
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nickname = $_POST['nickname'];

        function randPassId(){
            $PassId = '';
            $word = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $len = strlen($word);
    
            for($i=0;$i<20;$i++){
                //這是說我要從word裡面隨機挑一個數字出來,總共20次累加
                //rand()隨機一個數字,然後我在除以他的長度後,就變成一個數字
                $PassId .= $word[rand()%$len];
            }
            return $PassId;
        }
        
        //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO fan630_users (username,nickname,password ) VALUES ('$username','$nickname','$password')";
        $result = $conn->query($sql);

        /*發通行證*/
        if($result){
            $token = randPassId();
            $sql_giveToken = "INSERT INTO fan630_certificate (id, username) VALUES ('$token','$username')";
            $result_giveToken = $conn->query($sql_giveToken);
            /*成功取得通行證後,設定cookie*/
            if($result_giveToken){
                setcookie('member_id',$token, time()+3600*24);
                header('Location:./index.php');
            }else{
                echo "<script>alert('發生錯誤')</script>";
                header('Location:./register.php');   
            }
        }else{
            echo "<script>alert('發生錯誤')</script>";
            header('Location:./register.php');
        }
    }
?>

<!DOCTYPE html>
 <html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="./style.css">
    <title>Document</title>
 </head>
 <body>
     <div id="form__wrapper">
          <form action="./register.php" method="POST" class="form">
             <div>請輸入自訂帳號:
                <input type="text" name='username'>
             </div>
             <div>請輸入自訂密碼:
                 <input type="password" name='password'>
             </div>
             <div>請輸入暱稱:
                 <input type="nickname" name='nickname'>
             </div>
                 <input type="submit" class='btn'>
            </form>
         </div>
</body>
 </html>