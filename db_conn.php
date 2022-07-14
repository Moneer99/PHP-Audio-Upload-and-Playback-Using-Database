<?php

$serverName = "localhost";
$userName = "root";
$pass = "moneer90";

$db_name = "audio_db";

$conn = mysqli_connect($serverName,$userName,$pass,$db_name);

if (!$conn) {
    echo "Connection failed";
    exit();
}