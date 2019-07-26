<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<nav class='navbar'>
                <div class="navbar__left">
                    <div class="nav__item">
                        <a href="./index.php" class= "form__link">首頁</a>
                    </div>
                </div>
                <?php
                if(!$is_login){
                ?>
                    <div class="navbar__right__logout">
                        <div class="nav__item">
                            <a href="./register.php" class= "form__link">註冊</a>
                        </div>
                        <div class="nav__item">
                            <a href="./login.php" class= "form__link">登入</a>
                        </div>
                    </div>
                <?
                }else{
                ?>  <div class="navbar__right__login">
                        <div class="nav__item">
                            <a href="./logout.php" class= "form__link">登出</a>
                        </div>
                    </div>
                <?
                }
                ?>  
    </nav>
</html>