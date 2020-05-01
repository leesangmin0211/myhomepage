<?
   session_start();
?>
   <meta charset="UTF-8">
<?
//데이터 베이스 연결하기

include "db.php";

$memberid = $_GET[id];

$userid = $_SESSION['userid'];

$result = mysql_query("select id from login where id = '$memeberid' ", $db);
$row = mysql_fetch_array($result);


    $query = "delete from login where id = '$memberid' ";
   $result = mysql_query($query, $db);
?>

<center>
<meta http-equiv='Refresh' content='1; url=index.php'  />
<font size = 2> 삭제되었습니다.</font>
   