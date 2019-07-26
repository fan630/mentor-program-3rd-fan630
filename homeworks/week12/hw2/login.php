<?php
    require_once('./conn.php');
    include_once('./utils.php');

    if
    (
    isset($_POST['username'])&&
    isset($_POST['password'])&&
    !empty($_POST['username'])&&
    !empty($_POST['password'])
    )
    
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

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

        /*確認有此會員*/
        $stmt = $conn->prepare("SELECT * FROM fan630_users where username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt -> get_result();


        if($result->num_rows > 0){
            while($row= $result->fetch_assoc()){
                /*確認密碼是否吻合*/
                    if(password_verify($password,$hashed_password)){
                        setToken($conn, $username);
                        header('Location:./index.php');
                    }
                    else{
                        printMessage('請輸入正確帳號密碼!','./index.php');
                        exit();
                    }
                }
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
        <form class="form" action="./login.php" method="POST" >
        <div>請輸入會員帳號:
             <input type="text" name='username'>
        </div>
        <div>請輸入會員密碼:
            <input type="password" name='password'>
        </div>
        <div>
            <input type="hidden" name = 'id'>
        </div>
        <input type="submit" class="btn" />
        </form>
    </div>
</body>
</html>



