<?php

$SERVERNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "Practice";

$conn = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);

$title = $_POST['title']??'';
$descrip = $_POST['descrip']??'';
$error = [];

if(!empty($title) && !empty($descrip)){

    $insert = "INSERT INTO todoList(title, description) values('$title', '$descrip')";
    
    $run = mysqli_query($conn, $insert);
    
}







?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" Method = "POST">
        <h1>My Todo List</h1>
        <label for="title">Add Title</label> <br>
        <input type="text" name="title" > <br>
        <label for="title">Add Description</label> <br>
        <input type="text" name="descrip"> <br>
        <input type="submit"  name="btn" value="Add the Note">
    </form>
</body>
</html>