<?php 

$conn = mysqli_connect('localhost', '284043', '123456789', '284043');

if ($conn->connect_error){
    die("Database error: ".$conn->connect_error);
}