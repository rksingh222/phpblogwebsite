<?php

$host = "127.0.0.1";
$username = "root";
$password = "Rahul22-2-85";
$dbname = "blog";

$conn = new mysqli($host,$username,$password,$dbname);

if($conn->connect_error){
    die("connection failed" . $conn->connect_error);
}
else{
    echo "successful";
}

?>