<?php

$conn = mysqli_connect("localhost", "root", "", "practice");


$id = $_GET['id'];

$sql = "DELETE FROM todo where USER_ID = '$id'";

$delete = mysqli_query($conn, $sql);
if($delete){
    echo "deleted";
    header("location: index.php");
} else{
    echo "query failed";
}



?>