<?php 

$conn = mysqli_connect('localhost', '', '', '');

if ($conn->connect_error){
    die("Database error: ".$conn->connect_error);
}
