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
        <div class="content_2">
            <div class="name_box">
                <p>교내 외 활동</p>
            </div><br>
            <div class="dong">
                <p class="bigname"><a href="sinhan.php">신한은행 산학협력</a></p><br>
                <p>신한은행 본사에 가서 신한은행에서 하는일을 직접 보고 체험을 해볼 수 있었습니다.</p>
            </div><br>
            <div class="dong">
                <p class="bigname"><a href="pactori.php">스마트 팩토리 견학</a></p><br>
                <p></p>
            </div>
        </div>
    </div>
    <div id="footer">
        <p>Copyright &copy; 2020.04 Programed by LeeSangMin. All Rights Reserved.</p>
    </div> 
</body>
</html>