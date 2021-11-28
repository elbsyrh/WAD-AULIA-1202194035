<?php
session_start();
unset($_SESSION["login"]);
$_SESSION["keluar"] = "keluar";
setcookie('id', $row["id"], strtotime('-7 days'), '/');
unset($_SESSION["sementara"]);
header("Location: login.php");
exit;
?>