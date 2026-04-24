<?php

$conn = mysqli_connect("localhost", "root", "", "practice");

// if(!$conn){
//     die("connection failed");
// } else{
//     echo "connection successful";
// }


   if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    $select = "SELECT * FROM todo WHERE USER_ID = '$id'";
    $query = mysqli_query($conn, $select);

    if($query){
        echo "query ran";
    } else {
        echo "query failed";
    }
} else {
    echo "No ID received";
}






?>