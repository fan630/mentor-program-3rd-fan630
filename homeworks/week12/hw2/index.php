<?php
    require_once('./conn.php');
    include_once('./pagination.php');

    $is_login = false;
    $error_message ='';

    /*確認是否沒有通行證*/
    if(!isset($_COOKIE['member_id']))
    {
        $error_message='<div class="mark">請先完成註冊!</div>';
    }
      else
    {
       $is_login=true;
      
      $token = $_COOKIE['member_id'];
      $sql_CheckToken="SELECT * FROM fan630_certificate WHERE id = ? ";
      $stmt = $conn->prepare($sql_CheckToken);
      $stmt -> bind_param("s",$token);
      $stmt -> execute();
      $result_CheckToken = $stmt->get_result();
      
        if($result_CheckToken->num_rows > 0){
            while($row_CheckToken = $result_CheckToken->fetch_assoc()){
                $username = $row_CheckToken['username'];
            }
        }else{
            header('Location:./index.php');
        }
    }
    
    //主要的query
    $sql = "SELECT SQL_CALC_FOUND_ROWS c.content, c.created_at, c.username , c.id, u.nickname FROM fan630_comments as c LEFT JOIN fan630_users as u ON c.username = u.username 
    WHERE c.parent_id = ? ORDER BY created_at DESC LIMIT {$start}, {$perPage}";


    //為了要讓c.parent_id = 0, 因此透過$x 來賦值為0
    $x = 0;

    //主留言
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("s",$x);
    $stmt -> execute();
    $result = $stmt->get_result();

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
            <?php
                include_once('./navbar.php');
            ?>

            <div class="warning">
                <p>本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼</p>
             </div>
            <h1>會員留言板</h1>
            <?php               
                if($error_message !== ''){
                    echo $error_message;
                }else{
                    echo '<div class="welcome">Welcome: </div>' . htmlspecialchars($username);
                }
            ?>
            
            <!-- 主留言表格 -->
            <div id="form__wrapper">
                <form action="./handle_add.php" method="POST">
                    <div>
                        <textarea name="content" class="content" cols="70" rows="10"  placeholder="請輸入留言"></textarea>
                    </div>
                    <div>
                        <input type="hidden" name="nickname" value="0">
                    </div>
                    <div>
                        <input type="hidden" name="parent_id" value="0">
                    </div>
                    <?php
                        if($is_login){
                            echo "<input type='submit' class='btn' value='送出'>";
                        }else{
                            echo "<input type='submit' class='btn' value='請先登入' disabled>";
                        }
                    ?>
                </form>
            </div>
            <!-- 主留言表格 -->

            <!-- message_contents -->
            <div class="msgboard__display">
                    <?php                        
                        if($result->num_rows>0){
                          while($row = $result -> fetch_assoc()){
                            //登入狀態
                            if($is_login){
                                echo "<div class='container'>";
                                echo   "<div class='msgboard__display__top'>";
                                echo             "<div class='sub_nickname'>";
                                echo                 htmlspecialchars("暱稱:$row[nickname]",ENT_QUOTES,'utf-8');
                                echo             "</div>";
                                echo       htmlspecialchars("留言內容:$row[content]",ENT_QUOTES,'utf-8');
                                echo       "<div class='created_at'>Time:$row[created_at]</div>";
                                echo    "</div>";
                                echo   "<div class='msgboard__display__bottom'>";
                                echo       "<div class = 'form__link'>";
                                echo            "<a href='./delete.php?username=$row[username]&id=$row[id]&parent_id=$row[id]'>刪除留言</a>";
                                echo            "<a href='./update.php?username=$row[username]&id=$row[id]'>更改留言</a>";
                                echo       "</div>";
                            ?>
                            
                            <?php
                            //子留言
                            $sql_sub = "SELECT c.content, c.username, c.id, c.nickname FROM fan630_comments as c LEFT JOIN fan630_users as u ON c.username = u.username 
                            WHERE c.parent_id = ? ORDER BY created_at DESC";

                            $stmt = $conn->prepare($sql_sub);
                            $id = $row['id'];
                            $stmt -> bind_param('s', $id);
                            $stmt -> execute(); 
                            $result_sub = $stmt -> get_result();

                                        if($result_sub->num_rows>0){
                                        while($row_sub = $result_sub -> fetch_assoc()){
                                            //確認是否為原PO
                                            if($row['username'] == $row_sub['username']){
                                                echo        "<div class='msgboard__display__sub__same'>";
                                                echo             "<div class='sub_nickname'>";
                                                echo                 htmlspecialchars("暱稱:$row_sub[nickname]",ENT_QUOTES,'utf-8');
                                                echo             "</div>";
                                                echo                 htmlspecialchars("留言內容:$row_sub[content]",ENT_QUOTES,'utf-8');
                                                echo        "</div>";
                                            }else{
                                                echo        "<div class='msgboard__display__sub'>";
                                                echo             "<div class='sub_nickname'>";
                                                echo                 htmlspecialchars("暱稱:$row_sub[nickname]",ENT_QUOTES,'utf-8');
                                                echo             "</div>";
                                                echo                 htmlspecialchars("留言內容:$row_sub[content]",ENT_QUOTES,'utf-8');
                                                echo        "</div>";
                                            }
                                        }
                                    }
                            echo    "</div>";
                        ?>
                        <!-- 子留言新增內容表格 -->
                            <form class="subcomments" action="./handle_feedback.php" method="POST">
                                <h3>新增留言</h3>
                                <div class="text">
                                    <input type="text" name = 'nickname'  placeholder="請輸入暱稱">
                                </div>
                                <div class = subcomment>
                                    <textarea name="content" class="content" cols="15" rows="5"  placeholder="請輸入留言"></textarea>
                                </div>
                                <div>
                                    <input type="hidden" name = 'parent_id' value="<?php echo $row['id']?>" >
                                </div>
                                <div>
                                    <input type="submit" class="btn">
                                </div>
                            </form>
                        <!-- 子留言表格 -->
                        
                    <!-- 對應主留言的container-->
                        <?php
                        echo "</div>";
                    }
                    // 沒有登入的時候,編輯和刪除無法顯示
                    else{
                            echo "<div class='container'>";
                            echo   "<div class='msgboard__display__top'>";
                            echo       "<div class='nickname'>暱稱:$row[nickname]</div>";
                            echo       htmlspecialchars("留言內容:$row[content]",ENT_QUOTES,'utf-8');
                            echo       "<div class='created_at'>Time:$row[created_at]</div>";
                            echo    "</div>";

                            $sql_sub = "SELECT SQL_CALC_FOUND_ROWS c.content, c.created_at, c.username , c.id, c.nickname FROM fan630_comments as c LEFT JOIN fan630_users as u ON c.username = u.username 
                            WHERE c.parent_id = ? ORDER BY created_at ";

                            $stmt = $conn->prepare($sql_sub);
                            $id = $row['id'];
                            $stmt -> bind_param('s', $id);
                            $stmt -> execute(); 
                            $result_sub = $stmt -> get_result();

                    //沒有登入的時候,新增留言無法顯示,子留言可以顯示
                            if($result_sub->num_rows>0){
                                while($row_sub = $result_sub -> fetch_assoc()){
                                    //確認是否為原PO
                                    if($row['username'] == $row_sub['username']){
                                        echo        "<div class='msgboard__display__sub__same'>";
                                        echo             "<div class='sub_nickname'>";
                                        echo                 htmlspecialchars("暱稱:$row_sub[nickname]",ENT_QUOTES,'utf-8');
                                        echo             "</div>";
                                        echo                 htmlspecialchars("留言內容:$row_sub[content]",ENT_QUOTES,'utf-8');
                                        echo        "</div>";
                                    }else{
                                        echo        "<div class='msgboard__display__sub'>";
                                        echo             "<div class='sub_nickname'>";
                                        echo                 htmlspecialchars("暱稱:$row_sub[nickname]",ENT_QUOTES,'utf-8');
                                        echo             "</div>";
                                        echo                 htmlspecialchars("留言內容:$row_sub[content]",ENT_QUOTES,'utf-8');
                                        echo        "</div>";
                                    }
                                }
                            }
                            echo  "</div>";
                          }
                        }
                      }
                    ?>
                </div>  
                <a href="" class="pages"></a>
                <div class="pagination">
                    <?php for($x=1; $x<=$pages; $x++):?>
                        <a href="?page=<?php echo $x;?>&perPage=<?php echo $perPage;?>" class="pages">
                                <?php echo $x; ?>
                        </a>
                    <?php endfor;?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>