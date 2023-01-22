<?php
include('connetion.php');

// updated data 
$id = $_POST['upID'];
$name = $_POST['upName'];
$email = $_POST['upEmail'];

$sql = "UPDATE datatable SET name='$name',email='$email' WHERE id = $id";
$result = mysqli_query($con,$sql);
?>