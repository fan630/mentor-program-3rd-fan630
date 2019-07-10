<?php
    require_once('./conn.php');

    $is_login = false;
    $error_message ='';

    /*確認是否沒有通行證*/
    if(!isset($_COOKIE['member_id']))
    {
        $error_message='<div class="mark">請先完成註冊!</div>';
        //echo "<script>alert('請先完成註冊！')</script>";
    }
      else
    {
      $token = $_COOKIE['member_id'];
      $sql_CheckToken="SELECT * FROM fan630_certificate WHERE id = '$token' ";
      $is_login=true;

      /*檢查通行證是否正確*/
      $result_CheckToken = $conn->query($sql_CheckToken); 

      /*正確才把username給他*/
        if($result_CheckToken->num_rows > 0){
            while($row_CheckToken = $result_CheckToken->fetch_assoc()){
                $username = $row_CheckToken['username'];
            }
        }else{
            echo "<script>alert('發生錯誤')</script>";
            header('Location:./index.php');
        }
    }

        //user input 
        //第幾頁?
        //是否有得到get的值? 有就是我get的到的page,沒有就是第一頁
        $page = isset($_GET['page']) ?(int)$_GET['page']:1 ;
        
        //每頁顯示幾筆資料
        //是否有拿到perPage的資料,有的話就是我點選的perPage,沒有的話就顯示第五個.
        $perPage = isset($_GET['perPage']) && $_GET['perPage']<=50 ? (int)$_GET['perPage']:5; 
        
        //positioning 位置,判斷是否大於1, 如果是
        $start = ($page>1) ? ($page * $perPage) - $perPage:0;
        
        $sql = "SELECT SQL_CALC_FOUND_ROWS c.content, c.created_at , c.username , u.nickname , c.id FROM fan630_comments as c LEFT JOIN fan630_users as u ON c.username = u.username 
        ORDER BY created_at DESC LIMIT {$start}, {$perPage}";

        $result_count = $conn->query("SELECT COUNT(id) FROM fan630_comments");
        $sum1 = $result_count->fetch_assoc();
        $sum = $sum1['COUNT(id)'];
        $pages = ceil($sum/$perPage); 

        $result = $conn->query($sql);
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
            <?php
                if($error_message !== ''){
                    echo $error_message;
                }else{
                    echo '<div class="welcome">Welcome: </div>' . $username;
                }
            ?>
         <div id="form__wrapper">
               <form action="./handle_add.php" method="POST">
                <div>
                    <textarea name="content" class="content" cols="70" rows="10"  placeholder="請輸入留言"></textarea>
                </div>
                <div>
                    <input type="submit" class="btn">
                </div>
                </form>
           </div>
           <?php
            if(!$is_login){
                ?>
                    <a href="./register.php" class= "form__link">註冊</a>
                    <a href="./login.php" class= "form__link">登入</a>
                <?  
                    }else{
                ?>
                    <a href="./logout.php" class= "form__link">登出</a>
                <?
                    }
            ?>
            <div class="msgboard__display">
                    <?php                        
                        if($result->num_rows>0){
                            while($row = $result -> fetch_assoc()){
                                if(!$is_login){
                                    echo "<div class='container'>";
                                    echo   "<div class='msgboard__display__top'>";
                                    echo       "<div class='nickname'>暱稱:$row[nickname]</div>";
                                    echo      "<div class='content'>留言內容:$row[content]</div>";
                                    echo       "<div class='created_at'>Time:$row[created_at]</div>";
                                    echo    "</div>";
                                    echo "</div>";
                                }else{
                                    echo "<div class='container'>";
                                    echo   "<div class='msgboard__display__top'>";
                                    echo       "<div class='nickname'>暱稱:$row[nickname]</div>";
                                    echo      "<div class='content'>留言內容:$row[content]</div>";
                                    echo       "<div class='created_at'>Time:$row[created_at]</div>";
                                    echo    "</div>";
                                    echo   "<div class='msgboard__display__bottom'>";
                                    echo       "<div class = 'link'>";//&users_id=$row[users_id]//id=$row[id]
                                    echo            "<a href='./delete.php?username=$row[username]&id=$row[id]'>刪除留言</a>";
                                    echo            "<a href='./update.php?username=$row[username]&id=$row[id]'>更改留言</a>";
                                    echo       "</div>";
                                    echo   "</div>";
                                    echo "</div>";
                                }
                            }
                        }
                    ?>
        </div>
            <a href="" class="pages"></a>
            <div class="pagination">
                <?php for($x=1; $x<=$pages; $x++):?>
                <a href="?page=<?php echo $x;?>&perPage=<?php echo $perPage;?>" class="pages"><?php echo $x; ?></a>
                <?php endfor;?>
            </div>
        </div>
    </div>
</body>
</html>