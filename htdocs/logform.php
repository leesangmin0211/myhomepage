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
	if(!$_SESSION['userid'])
	{
  ?>
	<div id="cont">
	<div class="sub">
            <ul>
            <li><a href="scool.php">교내 활동</a></li>
            <li><a href="other.php">교내 외 활동</a></li>
        </ul>
        </div>
	<div class="myinfo">
		<h1> 로그인</h1><br>
		<form name="member_form" method="post" action="login.php" >
			* 아이디 : <input type="text" name="id" /><br />
			* 패스워드 : <input type="password" name="pass" /><br />
			<input type="submit" value="로그인하기" />
			<input type="reset" value="다시작성" />
		</form>
		</div>
	</div>
 <?
	}
  else
  {
  ?>
	    <h1> 회원으로 로그인이 되어있습니다. </h1>
<?
	  echo ("
				<script>
					location.href='index.php';
				</script>		");
  }
?>
<div id="footer">
        <p>Copyright &copy; 2020.04 Programed by LeeSangMin. All Rights Reserved.</p>
    </div>
 </body>
</html>

