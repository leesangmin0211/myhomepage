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
    include 'main.php';
    ?>
    <?php
    include 'db.php';
    $userid = $_SESSION['userid'];
    $sql = "select * from login where id = '$userid'";
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
        <h3>정보 수정</h3>
        <form name="member_form" method="post" action="modify.php" class="myinfo">
            * ID : <?= $row[id] ?> <br />
            * PW : <input type="password" name="pass" value="<?=$row[pass] ?>" /><br />
            * Nick : <input type="text" name="nick"  value="<?=$row[nick] ?>"/><br />
            * Name : <input type="text" name="name"  value="<?=$row[name] ?>" /><br />
            * Sex : <input type="radio" name="sex" value="m" checked /> 남자
            <input type="radio" name="sex" value="f" /> 여자 <br /><br />
            <input type="submit" value="수정하기" />
            <input type="reset" value="다시작성" />
        </form>
    </div>
</body>
</html>