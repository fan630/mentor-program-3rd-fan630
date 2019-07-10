<?php
    require_once('./conn.php');

    $error_message = '';

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
        $sql = "SELECT * FROM fan630_users where username = '$username'";
        $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result-> fetch_assoc())
                {
                // echo($password);
                // echo($row["password"]);
        /*確認密碼是否吻合*/
                if(password_verify($password,$hashed_password)){
                    //echo ($row['password'].$hashed_password);
                    $token = randPassId();
                    $sql_giveToken = "INSERT INTO fan630_certificate (id, username) VALUES ('$token','$username')";
                    $result_giveToken = $conn->query($sql_giveToken);
        /*成功取得通行證後,設定cookie*/

                    if($result_giveToken){
                        setcookie('member_id',$token, time()+3600*24);
                        header('Location:./index.php');
                    }else{
                        $sql2 = "UPDATE fan630_certificate SET id = '$token' WHERE username = '$username' ";
                        $result2 = $conn->query($sql2);
                        setcookie('member_id',$token, time()+3600*24);
                        header('Location:./index.php');
                    }

                //   }else{
                //         //$error_message = '密碼錯誤';
                //         echo ('failed:filter1錯誤'. $conn->error);
                //   }
                }else{
                echo ('failed:filter2錯誤'. $conn->error);
            }
       }
    }else{
        $error_message = '請輸入正確帳號密碼';
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
         <?php
            if($error_message !== ''){
                echo $error_message;
            }
        ?>
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



