<meta charset="utf-8">
<?php
include 'db.php';

$ID = $_GET['id'];
$PASSWORD = $_GET['password'];
$NICK = $_GET['nick'];
$NAME = $_GET['name'];
$SEX = $_GET['sex'];
$BLOOD = $_GET['blood'];
$query = "INSERT INTO login VALUE('$ID','$PASSWORD','$NICK','$NAME','$SEX','$BLOOD')";
mysql_query($query);
?>


<script>
    window.location = "logform.php";
    alert = ("회원가입 완료. 다시 로그인 해주세요.");
</script>