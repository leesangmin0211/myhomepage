<?
   session_start();
?>
    <meta charset="UTF-8">
<?
//데이터 베이스 연결하기

include "db.php";

$result = mysql_query("select pass from board where id = $_GET[id]", $db);

if($_SESSION['userid'] == 'admin')
{
    $adresult = mysql_query("select pass from login where id = 'admin' ",$db);
   $adrow = mysql_fetch_array($adresult);
}

$row = mysql_fetch_array($result);

if($_POST[pass] == $row[pass] || $_POST[pass] == $adrow[pass])
{
   $query = "delete from board where id = $_GET[id]";
   $result = mysql_query($query, $db);
}


else
{
   echo ("
   <script>
   alert('비밀번호가 틀립니다.');
   history.go(-1);
   </script>
   ");
   exit;
}
?>

<center>
<meta http-equiv='Refresh' content='1; url=list.php'  />
<font size = 2> 삭제되었습니다.</font>
   