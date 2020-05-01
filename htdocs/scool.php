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
        <div class="sub">
            <ul>
            <li><a href="scool.php">교내 활동</a></li>
            <li><a href="other.php">교내 외 활동</a></li>
        </ul>
        </div>
        <div class="content">
            <div class="name_box">
                <p>교내활동</p>
            </div><br>
            <div class="dong">
                <p class="bigname"><a href="dong.php">동아리 활동</a></p><br>
                <p>웹&#8226;앱 개발 동아리는 매년 있는 동아리 발표회때 필요한 작품을 만들어 제출합니다.</p>
            </div><br>
            <div class="dong">
                <p class="bigname"><a href="competition.php">기능 경진 대회</a></p><br>
                <p>같은 과 학생들이 주어진 주제로 경쟁하는 대회입니다.</p>
            </div><br>
            <div class="dong">
                <p class="bigname"><a href="work.php">작품 활동</a></p><br>
                <p>개인 적으로 여러가지 작품을 만들어 보았습니다. 추후 수정을 통해 업그레이드 할 생각입니다.</p>
            </div>
        </div>
    </div>
    <div id="footer">
        <p>Copyright &copy; 2020.04 Programed by LeeSangMin. All Rights Reserved.</p>
    </div>
</body>
</html>