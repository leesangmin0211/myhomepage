<?php
	session_start();
?>
<meta charset="UTF-8">
<?php
    include "db.php";

	$sql = "select * from login where id='$_POST[id]'";
	$result = mysql_query($sql, $db);

	$num_match = mysql_num_rows($result);

	if(!$num_match)
	{
		echo ("
			<script>
				window.alert('등록되지 않은 아이디입니다.')
				history.go(-1)
			</script>		");
	}
	else
	{
		$row = mysql_fetch_array($result);
		$db_pass = $row[password];
		if($_POST[pass] != $db_pass)
		{
			echo ("
			<script>
				window.alert('비밀번호가 틀립니다.')
				history.go(-1)
			</script>		");
			exit;
		}
		else
		{
			$userid = $row[id];
			$usernick = $row[nick];
            $username = $row[name];

			$_SESSION['userid'] = $userid;
			$_SESSION['usernick'] = $usernick;
            $_SESSION['username'] = $username;

			echo ("
				<script>
					location.href='index.php';
				</script>		");
		}
	}
?>