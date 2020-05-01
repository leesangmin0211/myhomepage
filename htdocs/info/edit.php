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
    if($_SESSION['userid']){
    ?>
    <form action="update.php?id=<?-$_GET[id];?>" method="post">
        <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
            <tr>
                <td height=20 align=center bgcolor=#999999>
                    <font color=white>
                        <b>글 수 정 하 기</b>
                    </font>
                </td>
            </tr>
            <?php
            include 'db.php';
            $result=mysql_query("select * from board where id=$_GET[id]",$db);
            $row=mysql_fetch_array($result);
            ?>
            
            <tr>
                <td bgcolor=white>&nbsp;
                    <table>
                        <tr>
                            <td width=60 align=left nowrap>이름</td>
                            <td align=left>
                                <input type="text" name="size=20" value="<?=$row[name];?>">
                            </td>
                        </tr>
                        <tr>
                            <td width=60 align=left nowrap>닉네임</td>
                            <td align=left><?=$row[nick];?></td>
                        </tr>
                        <tr>
                            <td width=60 align=left nowrap>비밀번호</td>
                            <td align=left>
                                <input type="password" name="pass" size="8">(비밀번호가 맞아야 수정가능)
                            </td>
                        </tr>
                        <tr>
                            <td width=60 align=left nowrap>제목</td>
                            <td align=left>
                                <input type="text" name="title" size=60 value="<?=$row[title]?>">
                            </td>
                        </tr>
                        <tr>
                            <td width=60 align=left nowrap>내용</td>
                            <td align=left>
                                <textarea name="comment" cols="65" rows="15"><?=$row[content]?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=10 align=center>
                                <input type="submit" value="글 저장하기">
                                &nbsp;&nbsp;
                                <input type="reset" value="다시 쓰기">
                                &nbsp;&nbsp;
                                <input type="button" value="되돌아가기" onClick="history.back(-1)">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
    <?php
    }else{
        echo ("
                <script>
                    window.alert('로그인을 해야 합니다.')
                    location.href='logform.php
                </script>
            ");
    }
    ?>
</body>
</html>