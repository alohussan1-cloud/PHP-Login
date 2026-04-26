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

// if(isset($_GET['edit'])){
//     $id = $_GET['edit'];
//     header("Location: edit.php?edit=$id");
//     exit();
// }

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
  
</style>
<body>
    <form action="" Method = "POST">
        <h1>My Todo List</h1>
        <label for="title">Add Title</label> <br>
        <input type="text" name="title" > <br>
        <span> <?php echo $error['title']??'';?></span> <br>
        <label for="title">Add Description</label> <br>
        <input type="text" name="descrip"> <br>
        <span> <?php echo $error['descrip']??''; echo "<br>" ;?> </span> 
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
    
    <td> <a href="edit.php?id=<?php echo $row['USER_ID']?>" id="edit">Edit</a>
     <a href="delete.php?id=<?php echo $row['USER_ID']?>" id="delete">Delete</a></td>
  </tr>
  <?php
 }
}

?>
</table>

</body>
</html>

