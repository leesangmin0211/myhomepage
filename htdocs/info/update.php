  <meta charset="UTF-8">
<?
//데이터 베이스 연결하기
include "db.php";

// 글의 비밀번호를 가져온다.
$query = "select pass from board where id = $_GET[id]";
$result=mysql_query($query, $db);
$row=mysql_fetch_array($result);

//입력된 값과 비교한다.
if ($_POST[pass]==$row[pass]) { //비밀번호가 일치하는 경우

$query = "update board set name='$_POST[name]',title='$_POST[title]',content='$_POST[comment]' where id=$_GET[id] ";
$result=mysql_query($query, $db);
} 
else { // 비밀번호가 일치하지 않는 경우
echo ("
<script>
alert('비밀번호가 틀립니다.');
history.go(-1);
</script>
");
exit;
}

//데이터베이스와의 연결 종료
mysql_close($db);

//수정하기인 경우 수정된 글로..
echo ("<meta http-equiv='Refresh' content='1; URL=dbread.php?id=$_GET[id]'>");

?>
<center>
<font size=2>정상적으로 수정되었습니다.</font>