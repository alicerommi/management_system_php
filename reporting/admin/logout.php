<?php
SESSION_START();
unset($_SESSION['admin']);
header("Location: login.php");
?>