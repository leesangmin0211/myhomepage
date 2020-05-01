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
    <center>
        <br>
        <?php
        if($_SESSION['userid']){
        ?>
        <!--입력된 값을 다음 페이지로 넘기기 위해 form을 만든다. -->
        <form action="dbinsert.php" method="post">
            <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
                <tr>
                    <td height=20 align=center bgcolor=#999999>
                        <font color=white><h1>글 쓰 기</h1></font>
                    </td>
                </tr>
                <!--입력 부분-->
                <tr>
                    <td bgcolor=white>&nbsp;
                    <table>
                        <tr>
                            <td width=80 align=left nowrap>이름</td>
                            <td width=440 align=left>
                                <input type="text" name="name" size="20" maxlength="30">
                            </td>
                        </tr>
                        <tr>
                            <td width=80 align=left nowrap>닉네임</td>
                            <td width=440 align=left>
                                <input type="text" name="nick" size="20" maxlength="30" value="<?=$_SESSION['usernick']?>">
                            </td>
                        </tr>
                        <tr>
                            <td width=80 align=left nowrap>비밀번호</td>
                            <td width=440 align=left>
                                <input type="password" name="pass" size="8" maxlength="8">
                                (수정,삭제시 반드시 필요)
                            </td>
                        </tr>
                        <tr>
                            <td width=80 align=left nowrap>제 목</td>
                            <td width="440" align=left>
                            <input type=text name=title size=60 maxlength=35></td>
			            </tr>
                        <tr>
                            <td width=80 align=left nowrap>내용</td>
                            <td width=440 align=left>
                                <textarea name="comment" cols="70" rows="20"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=10 align=center>
                                <input type="submit" value="글 저장하기">&nbsp;&nbsp;
                                <input type="reset" value="다시 쓰기">&nbsp;&nbsp;
                                <input type="button" value="돌아가기" onclick="history.back(-1)">
                            </td>
                        </tr>
                    </table>
                    </td>
                </tr>
                <!--입력 부분 끝-->
            </table>
        </form>
        <?php
        }else{
        ?>
        <h1>로그인이 필요합니다.</h1>
        <?php
            echo("
                    <script>
                        location.href='logform.php';
                    </script>
                ");
        }
        ?>
    </center>
</body>
</html>