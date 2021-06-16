<?php 

$conn = mysqli_connect('localhost', '', '', ''); //veritabanı bilgileri 

if ($conn->connect_error){
    die("Database error: ".$conn->connect_error);
}
