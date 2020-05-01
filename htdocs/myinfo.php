<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php
        include 'top_main.php';
        ?>
        <div id="cont">
           <?php
            include "db.php";
            $userid = $_SESSION['userid'];
            $sql = "select * from login where id='$userid'";
            $result = mysql_query($sql, $db);
            $row = mysql_fetch_array($result);

            mysql_close();
            ?>
            <div id="cont">   
                <div class="sub">
                    <ul>
                        <li><a href="scool.php">교내 활동</a></li>
                        <li><a href="other.php">교내 외 활동</a></li>
                    </ul>
                </div>
                <div class="myinfo">
                  <h1>내 정보</h1><br>
                   <form>
                    ID : <?= $row[id] ?><br>
                    Nick : <?= $row[nick] ?><br>
                    Name : <?= $row[name] ?><br>
                    Sex : <?= $row[sex] ?><br>
                    Blood : <?= $row[blood] ?><br>
                    </form>
                    <a href="mem_modify.php"><button class="modi">정보 수정</button></a>  
                </div>
            </div>

        </div>
        <div id="footer">
        <p>Copyright &copy; 2020.04 Programed by LeeSangMin. All Rights Reserved.</p>
    </div>
    </body>
</html>