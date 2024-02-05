<?php
$con = mysqli_connect('localhost', 'root', '', 'dbase');

if (!$con) {
die("Connection failed: " . mysqli_connect_error());
}
?>