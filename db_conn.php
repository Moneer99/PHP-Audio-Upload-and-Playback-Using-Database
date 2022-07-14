<?php

$serverName = "localhost";
$userName = "root";
$pass = "moneer90";

$db_name = "audio_db";

$conn = mysqli_connect($serverName,$userName,$pass,$audio_db);

if (!$conn) {
    echo "Connection failed";
    exit();
}