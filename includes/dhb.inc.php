<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "loginSystem";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("conection failed:".mysqli_connect_error());
}
//Conection failure or not