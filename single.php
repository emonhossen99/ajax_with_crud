<?php 
include('connetion.php');
$getID = $_POST['updateID'];
$sql = "SELECT * FROM `datatable` WHERE id = $getID";
$result = mysqli_query($con,$sql);
$res = array();
while($row = mysqli_fetch_assoc($result)){
    $res = $row;
    
}
echo json_encode($res);

