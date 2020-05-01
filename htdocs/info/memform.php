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
    include "main.php";
    ?>
    <div id="cont">
       <h3>회원가입</h3>
        <form action="member.php" method="get">
            <table>
                <tr>
                    <td>아이디 : </td>
                    <td><input type="text" name="id"></td>
                </tr>
                <tr>
                    <td>비밀번호 : </td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>닉네임 : </td>
                    <td><input type="text" name="nick"></td>
                </tr>
                <tr>
                    <td>이름 : </td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>성별 : </td>
                    <td><input type="radio" name="sex" value="m" checked>남자<input type="radio" name="sex" value="f">여자</td>
                </tr>
                <tr>
                    <td>혈액형 : </td>
                    <td><select name="blood">
						<option value="a">A형</option>
						<option value="b">B형</option>
						<option value="o">O형</option>
						<option value="ab">AB형</option>
					  </select></td>
                </tr>
                <tr>
                    <td><input type="submit" value="작성완료"></td>
                    <td><input type="reset" value="다시작성"></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="footer">
        <p>COPYRIGHT&copy; Maker LeeSangMin</p>
    </div>
</body>
</html>