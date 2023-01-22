<?php

$server = 'localhost';
$userName = 'root';
$password = '';
$db = 'ajaccurd';

$con = mysqli_connect($server,$userName,$password,$db);
if($con){
    // echo "succes";
}else{
    echo "error";
}



?>