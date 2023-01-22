<?php
include('connetion.php');

$name = $_POST['userName'];
$email = $_POST['userEmail'];

$sql = "INSERT INTO `datatable`(name, email) VALUES ('$name','$email')";
$result = mysqli_query($con,$sql);


?>