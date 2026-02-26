<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "sql209.infinityfree.com";
$user = "if0_41252224";
$pass = "00sweetpie";  // ใส่รหัสจริง
$db   = "if0_41252224_plango";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
