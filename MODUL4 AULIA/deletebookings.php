<?php
session_start();
$connectsql = mysqli_connect("localhost", "root", "", "wad_modul4");
$id = $_GET["id"];

$query = "DELETE FROM booking WHERE id = '$id'";

mysqli_query($connectsql, $query);

if (mysqli_affected_rows($connectsql) > 0){
    $_SESSION["terhapus"] = true;
    header("Location: bookings.php");
}

?>