<?php
/*
$host = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "mcas";
*/
$connect = mysqli_connect("localhost", "root", "", "mcas");

// Check connection
if (!$connect) {
    die("Failed to connect! Error: " .mysqli_connect_error());
}


// echo "Connected to the database";


