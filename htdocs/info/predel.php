<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    include 'main.php';
    ?>
    <?php
    if($_SESSION['userid']){
    ?>
    
    <form action="del.php?id=<?=$_GET[id]?>" method="post">
        <table width=300 border=0  cellpadding=2 cellspacing=1 bgcolor=#777777 class="table">
            <tr>
                <td height=20 align=center bgcolor=#999999>
                    <font color=white>
                        <b>비 밀 번 호 확 인</b>
                    </font>
                </td>
            </tr>
            <tr>
                <td align=center>
                    <font color=white>
                        <b>비밀번호 : </b>
                        </font>
                    <input type="password" name="pass" size="8" maxlength="8">
                    <input type="submit" value="확 인">
                    <input type="button" value="취 소" onclick="history.back(-1)">
                </td>
            </tr>
        </table>
        <?php
    }else{
        echo("
                <script>
                    window.alert('로그인을 해야 합니다.')
                    location.href='logform.php'
                </script>
            ");
    }
    ?>   
    </form>
</body>
</html>