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

<center>
<BR>
<?
	if($_SESSION['userid'])
	{
  ?>
<!-- 입력된 값을 다음 페이지로 넘기기 위해 FORM을 만든다. -->
    <form action=memdel.php?id=<?=$_SESSION['userid']?> method=post>

<table width=300 border=0  cellpadding=2 cellspacing=1 bgcolor=#777777>
<tr>
    <td height=20 align=center bgcolor=#999999>
        <font color=white><B>비 밀 번 호 확 인</B></font>
    </td>
</tr>
<tr>
    <td align=center>
        <font color=white><B>비밀번호 : </B></font>
        <INPUT type=password name=pass size=8 maxlength=8/>
        <INPUT type=submit value="확 인"/>
        <INPUT type=button value="취 소" onclick="history.back(-1)"/>
    </td>
</tr>
</table>

<?
	}
  else
  {

	  echo ("
				<script>
					window.alert('로그인을 해야 합니다.')
					location.href='logform.php'
				</script>		");
  }
?>
<div id="footer">
        <p>Copyright &copy; 2020.04 Programed by LeeSangMin. All Rights Reserved.</p>
    </div>