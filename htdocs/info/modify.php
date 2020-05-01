<?php
session_start();
?>
<meta charset="UTF-8">
<?php
include "db.php";
$pass = $_POST[pass];
$nick = $_POST[nick];
$name = $_POST[name];
$sex = $_POST[ra_btn];

$userid = $_SESSION['userid'];
$sql = "UPDATE login set 'pass'='$pass', 'name'='$name','nick'='$nick', 'sex'='$sex' where id = '$userid' "; 
mysql_query($sql, $db);
mysql_close($db);
echo " 
		<script>
			location.href = 'index.php';
		</script> ";
?>
