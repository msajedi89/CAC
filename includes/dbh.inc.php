<?php

$servername = "localhost";
$dbUsername = "cac_caccac";
$dbPassword = "IeKz(QX*voyJ";
$dbName = "cac_caccac";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

// Check the Connection
if (!$conn) {
    die("Connection Failed: ".mysqli_connect_error());
}