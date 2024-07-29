<?php
// dbcon.php

$host = 'localhost'; // Change to your database host
$user = 'u791171477_lawadvocte';      // Change to your database username
$password = 'Lawadvocte@523';      // Change to your database password
$database = 'u791171477_law'; // Change to your database name

$con = mysqli_connect($host, $user, $password, $database);
if (!$con) {
    die("Connection Unsuccessful!");
}
?>
