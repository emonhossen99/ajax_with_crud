<?php
include('connetion.php');
$getID = $_POST['sendId'];

$sql = "DELETE FROM datatable WHERE id=$getID";
$result = mysqli_query($con,$sql);


?>