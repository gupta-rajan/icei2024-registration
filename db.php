<?php

$configs = include('config.php');

$servername = $configs['host'];
$username = $configs['username'];
$password = $configs['password'];;
$database = $configs['database'];

$conn  = mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    die("Error in connection.".mysqli_error($conn));
}

?>