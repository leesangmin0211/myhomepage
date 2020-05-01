<?
session_start();
?>
<!doctype html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <title>homepage</title>
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <? include "top_main.php"; ?>
        <?
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
        <h1> 정보수정</h1><br>
        <form name="member_form" method="post" action="modify.php" >
            * 아이디 : <?= $row[id] ?> <br />
            * 패스워드 : <input type="password" name="pass" value="<?=$row[pass] ?>" /><br />
            * 닉네임 : <input type="text" name="nick"  value="<?=$row[nick] ?>"/><br />
            * 이름 : <input type="text" name="name"  value="<?=$row[name] ?>" /><br />
            * 성별 : <input type="radio" name="ra_btn" value="m" checked /> 남자
            <input type="radio" name="ra_btn" value="f" /> 여자 <br />
            * 혈액형 : <select name="combo_box">
                <option value="a">A형</option>
                <option value="b">B형</option>
                <option value="o">O형</option>
                <option value="ab">AB형</option>
            </select><br /><br />
            <input type="submit" value="수정하기" />
            <input type="reset" value="다시작성" />
        </form>
       </div>
    </div>
<div id="footer">
        <p>Copyright &copy; 2020.04 Programed by LeeSangMin. All Rights Reserved.</p>
    </div>
</body>
</html>

