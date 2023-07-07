<?php
SESSION_START();
unset($_SESSION['dealer']);
header("Location: login.php");
?>