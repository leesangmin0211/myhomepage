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
    include "main.php"
    ?>
    <div id="cont">
       <?php
	if(!$_SESSION['userid'])
	{
  ?>
	<div class="login">
		<h1> 로그인</h1>
		<form name="member_form" method="post" action="login.php" class="form">
			* 아이디 : <input type="text" name="id" /><br />
			* 패스워드 : <input type="password" name="pass" /><br />
			<input type="submit" value="로그인하기" />
			<input type="reset" value="다시작성" />
		</form>
	</div>
 <?php
	}
  else
  {
  ?>
	    <h1> 회원으로 로그인이 되어있습니다. </h1>
<?php
	  echo ("
				<script>
					location.href='index.php';
				</script>		");
  }
?>
    </div>
    <div id="footer">
        <p>COPYRIGHT&copy; Maker LeeSangMin</p>
    </div>
</body>
</html>