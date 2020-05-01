  <meta charset="UTF-8">
<?php

include "db.php";


$query = "select pass from board where id = $_GET[id]";
$result=mysql_query($query, $db);
$row=mysql_fetch_array($result);


if ($_POST[pass]==$row[pass]) { 

$query = "update board set name='$_POST[name]',title='$_POST[title]',content='$_POST[comment]' where id=$_GET[id] ";
$result=mysql_query($query, $db);
} 
else { 
echo ("
<script>
alert('비밀번호가 틀립니다.');
history.go(-1);
</script>
");
exit;
}


mysql_close($db);


echo ("<meta http-equiv='Refresh' content='1; URL=dbread.php?id=$_GET[id]'>");

?>
<center>
<font size=2>정상적으로 수정되었습니다.</font>