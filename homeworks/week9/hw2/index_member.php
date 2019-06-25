<?php
    require_once('./conn.php');
    $sql = "SELECT c.content, c.created_at, c.id ,u.nickname FROM fan630_comments as c JOIN fan630_users as u ON c.username = u.username ORDER BY created_at DESC";
    $result= $conn->query($sql);
    if (!$result) {
        trigger_error('Invalid query: ' . $conn->error);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style.css">
    <title>會員留言板</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="warning">
                本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼
             </div>
            <h1>會員留言板</h1>
            <a href="./register.php">註冊</a>
            <a href="./login.php">登入</a>
            <div class="msgboard__display">
            <?php
                if($result->num_rows>0){
                     while($row = $result -> fetch_assoc()){
                        echo "<div class='container'>";
                        echo   "<div class='msgboard__display__top'>";
                        echo       "<div class='nickname'>暱稱:$row[nickname]</div>";
                        echo      "<div class='content'>$row[content]</div>";
                        echo       "<div class='created_at'>$row[created_at]</div>";
                        echo    "</div>";
                        echo   "<div class='msgboard__display__bottom'>";
                        echo   "</div>";
                        echo "</div>";
                    }
                  }
            ?>
        </div>
        </div>
    </div>
</body>
</html>