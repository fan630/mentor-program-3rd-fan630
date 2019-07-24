<?php
    require_once('./conn.php');
    include_once('./utils.php');

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
        
        $sql = "INSERT INTO fan630_users (username,hashed_password,nickname) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $nickname = $_POST['nickname'];

        $stmt -> bind_param("sss",$username, $hashed_password, $nickname);

        /*發通行證*/
        if($stmt -> execute()){
            setToken($conn, $username);
            header('Location:./index.php');
        }else{
            echo('帳號或是密碼錯誤!');
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
    <title>Register</title>
 </head>
 <body>
     <div id="form__wrapper__register">
          <form action="./register.php" method="POST" class="form">
            
             <div class="form__row">請輸入自訂帳號:
                <input type="text" name='username'>
             </div>
             <div class="form__row">請輸入自訂密碼:
                 <input type="password" name='password'>
             </div>
             <div class="form__row">請輸入暱稱:
                 <input type="nickname" name='nickname'>
             </div class="form__row">
                 <input type="submit" class='btn'>
            </form>
         </div>
</body>
 </html>