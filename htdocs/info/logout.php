<?php
session_start();
unset($_SESSION['userid']);
unset($_SESSION['usernick']);

echo("
        <script>
            location.href='index.php'
        </script>
    ");
?>