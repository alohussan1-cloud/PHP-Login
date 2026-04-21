<?php

$SERVERNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "Practice";

$conn = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);

$title = $_POST['title']??'';
$descrip = $_POST['descrip']??'';
$error = [];

if(isset($_POST['btn'])){
    if(empty($title)){
        $error['title'] = "Enter Title";
    }

    if(empty($title)){
        $error['descrip'] = "Enter Description";
    }
    
    if(empty($error)){
        
        $insert = "INSERT INTO todo(title, description) values('$title', '$descrip')";
        
        $run = mysqli_query($conn, $insert);
        
        }
   
} 


$select = "SELECT * FROM todo";

$data = mysqli_query($conn, $select);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f8;
    margin: 0;
    padding: 20px;
}

/* Form styling */
form {
    background-color: white;
    padding: 20px;
    width: 350px;
    margin: auto;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h1 {
    text-align: center;
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Button */
input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    border: none;
    color: white;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

/* Error text */
span {
    color: red;
    font-size: 13px;
}

/* Table styling */
table {
    width: 80%;
    margin: 30px auto;
    border-collapse: collapse;
    background-color: white;
}

th, td {
    padding: 5px;
    border: 1px solid #ddd;
    text-align:center;
}

th {
    background-color: #4CAF50;
    color: white;
}

/* Action links */
a {
    text-decoration: none;
    margin: 0 5px;
    color: #007BFF;
}

a:hover {
    text-decoration: underline;
}
</style>
<body>
    <form action="" Method = "POST">
        <h1>My Todo List</h1>
        <label for="title">Add Title</label> <br>
        <input type="text" name="title" > <br>
        <span> <?php echo $error['title']??'';?></span> <br>
        <label for="title">Add Description</label> <br>
        <input type="text" name="descrip"> <br>
        <span> <?php echo $error['descrip']??'';?> </span> 
        <input type="submit"  name="btn" value="Add the Note">
    </form>


 
    <table border= "1">
  <tr>
    <th width="40px">S NO. </th>
    <th width="80px">Title</th>
    <th width="160px">Description</th>
    <th width="60px">Actions</th>
  </tr>
  <?php
  $num = 0;
if($data){
    while($row = mysqli_fetch_assoc($data)){
   $num++;

?>
  <tr>
      <td><?php echo $num?></td>
      <td><?php echo $row['Title']; ?></td>
      <td><?php echo $row['Description']; ?></td>
    
    <td> <a href="?delete=<?php echo $row['USER_ID']; ?>">delete</a> <a href="#">Delete</a></td>
  </tr>
  <?php
 }
}

?>
</table>

</body>
</html>

