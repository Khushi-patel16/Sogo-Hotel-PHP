<?php

$servername="localhost";
$username="root";
$password="";
$database="hotel";

$connection = mysqli_connect($servername,$username,$password,$database);

if(!$connection)
{
    echo "Connect Problem";
}

?>
