<?php 

$conn = mysqli_connect('localhost', '', '', ''); //veritaban─▒ bilgileri 

if ($conn->connect_error){
    die("Database error: ".$conn->connect_error);
}
