<?php
$dbDatabase = "feed";

$dbServer = "localhost";

$dbUser = "root";

$dbPass = "";
$conn = mysqli_connect($dbServer, $dbUser, $dbPass, $dbDatabase) or die('Unable To connect');
?>