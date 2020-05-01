<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
   if(!$_SESSION['userid']){
    ?>
    <div id="header">
        <div class="header">
           <div class="logo">
                <img src="img/lsm.jpg" alt="로고">
            </div>
            <div class="menu">
                <ul id="top_menu">
                    <li><a href="index.php">홈&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="logform.php">로그인&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="member.php">회원가입&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="list.php">게시판&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
   }else if($_SESSION['userid']== 'admin'){
    ?>
    <div id="header">
        <div class="header">
           <div class="logo">
                <img src="img/lsm.jpg" alt="로고">
            </div>
            <div class="menu">
                <ul id="top_menu">
                   <li>관리자님 어서오십시오.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                    <li><a href="index.php">홈&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="myinfo.php">내정보&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="list.php">게시판&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="logout.php">로그아웃&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="memberinfo.php">회원 관리</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
   }else{
    ?>
    <div id="header">
        <div class="header">
           <div class="logo">
                <img src="img/lsm.jpg" alt="로고">
            </div>
            <div class="menu">
                <ul id="top_menu">
                    <li><?=$_SESSION['username']?>님 반갑습니다.다.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                    <li><a href="index.php">홈&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="logout.php">로그아웃&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="myinfo.php">내정보&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="list.php">게시판&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                    <li><a href="memout.php">회원탈퇴</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
   }
    ?>
</body>
</html>