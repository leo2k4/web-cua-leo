<?php

$mysqli = new mysqli("localhost", "root", "", "quan_ly_thong_tin");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
