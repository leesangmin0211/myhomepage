<?
   session_start();
?>
   <meta charset="UTF-8">
<?
//데이터 베이스 연결하기

include "db.php";

$userid = $_SESSION['userid'];

$result = mysql_query("select pass from login where id = '$userid' ", $db);
$row = mysql_fetch_array($result);

if($_POST[pass] == $row[pass])
{
    $query = "delete from login where id = '$userid' ";
   $result = mysql_query($query, $db);
    
    unset($_SESSION['userid']);
    unset($_SESSION['usernick']);
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
<meta http-equiv='Refresh' content='1; url=index.php'  />
<font size = 2> 삭제되었습니다.</font>
   