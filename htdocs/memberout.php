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
 <div id="cont">
<br>
<?
	if($_SESSION['userid'])
	{
  ?>
<!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
    <form action=memberdel.php?id=<?=$_GET[id]?> method=post>

<table width=300 border=0  cellpadding=2 cellspacing=1 bgcolor=#777777>
<tr>
    <td height=20 align=center bgcolor=#999999>
        <font color=white><B>진짜로 삭제하시겠습니까?</B></font>
    </td>
</tr>
<tr>
    <td align=center>
        <INPUT type=submit value="확 인"/>
        <INPUT type=button value="취 소" onclick="history.back(-1)"/>
    </td>
</tr>
</table>
    </form>
</div>
<?
	}
  else
  {

	  echo ("
				<script>
					window.alert('관리자로 로그인을 해야 합니다.')
					location.href='logform.php'
				</script>		");
  }
?>
<div id="footer">
        <p>Copyright &copy; 2020.04 Programed by LeeSangMin. All Rights Reserved.</p>
    </div>