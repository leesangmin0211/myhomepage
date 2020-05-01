<?
session_start();
?>
<meta charset="UTF-8">
<?
include "db.php";
$pass = $_POST[pass];
$nick = $_POST[nick];
$name = $_POST[name];
$sex = $_POST[ra_btn];
$bt = $_POST[combo_box];

$userid = $_SESSION['userid'];
$sql = "update member set pass='$pass', name='$name',nick='$nick', sex='$sex',combo='$combo' where id = '$userid' "; 
mysql_query($sql, $db);
mysql_close($db);
echo " 
		<script>
			location.href = 'index.php';
		</script> ";
?>
