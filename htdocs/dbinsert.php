<meta charset="UTF-8">
<?php
	//데이터 베이스 연결하기
	include "db.php";
	$query="insert into board (id, name, nick, pass, title, content, wdate, ip, view) values ('','$_POST[name]','$_POST[nick]','$_POST[pass]','$_POST[title]','$_POST[comment]', now(),'$_SERVER[REMOTE_ADDR]',0)";
	$result=mysql_query($query, $db);
//데이터베이스와의 연결 종료
	mysql_close($db);
// 새 글 쓰기인 경우 리스트로..
	echo("<meta http-equiv='Refresh' content='1; URL=list.php'>");
?>
<center>
<font size=2>정상적으로 저장되었습니다.</font>