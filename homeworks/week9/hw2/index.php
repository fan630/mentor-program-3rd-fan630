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
    <title>留言板</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h1>留言板</h1>
            <a href="./add.php">新增留言</a>
            <a href="./logout.php">登出系統</a>
            <?php
                if (isset($_COOKIE['username']) && !empty($_COOKIE['username'])) {
                    echo '<h3 class="welcome">歡迎會員: ' . $_COOKIE["username"]. '</h3>';
                } else {
                    echo "not login in";
                }
            ?>
        </div>
        <div class="msgboard__display">
            <?php
                if($result->num_rows>0){
                     while($row = $result -> fetch_assoc()){
                        echo "<div class='container'>";
                        echo   "<div class='msgboard__display__top'>";
                        echo       "<div class='nickname'>暱稱:$row[nickname]</div>";
                        echo      "<div><textarea name='content' id='' cols='123' rows='10' class='content'>$row[content]</textarea></div>";
                        echo       "<div class='created_at'>$row[created_at]</div>";
                        echo    "</div>";
                        echo   "<div class='msgboard__display__bottom'>";
                        echo       "<div><a href='./delete.php?id=$row[id]'>刪除留言</a></div>";
                        echo   "</div>";
                        echo "</div>";
                    }
                  }
            ?>
        </div>
    </div>
    
</body>
</html>