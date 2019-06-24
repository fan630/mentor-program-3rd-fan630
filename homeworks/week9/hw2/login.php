<!DOCTYPE html>
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
        <form class="form" action="./handle_login.php" method="POST" >
        <div>請輸入會員帳號:
             <input type="text" name='username'>
        </div>
        <div>請輸入會員密碼:
            <input type="password" name='password'>
        </div>
        <div>
            <input type="hidden" name = 'id'>
        </div>
        <input type="submit" name="login" class="btn" />
        </form>
    </div>
</body>
</html>

