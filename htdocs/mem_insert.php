<?
	session_start();
?>
<meta charset="UTF-8">
<?
    include "db.php";
	$id = $_POST[id];
	$pass = $_POST[pass];
	$nick = $_POST[nick];
	$name = $_POST[name];
	$sex = $_POST[ra_btn];
	$bt = $_POST[combo_box];


    $dbinsert = "insert into login values ('$id', '$pass', '$name', '$nick', '$sex', '$bt')";
	$result = mysql_query($dbinsert, $db);
	mysql_close($db);
	echo " 
		<script>
			location.href = 'index.php';
		</script> ";
?>
