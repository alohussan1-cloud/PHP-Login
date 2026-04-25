<?php

$conn = mysqli_connect("localhost", "root", "", "practice");


$id = $_GET['id'];

$sql = "SELECT * FROM todo where USER_ID = '$id'";

$select = mysqli_query($conn, $sql);
 
if($select){
    while($row = mysqli_fetch_assoc($select)){
        $title = $row['Title'];
        $descrip = $row['Description'];
    }
}



?>

<?php

$inputTitle = $_POST['title'];
$inputDescrip = $_POST['descrip'];

$update = "UPDATE todo SET Title ='$inputTitle', Description = '$inputDescrip' where USER_ID = '$id'";

$Query = mysqli_query($conn, $update);

if(isset($_POST['btn']))
if($Query){
    echo "query ran";
    header("location: index.php");
} else{
    echo "query failed";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form Method="POST" >
        <input type="text" name="title" value="<?php echo $title ?>"> <br> <br>
        <input type="text" name="descrip" value="<?php echo $descrip ?>" > <br> <br>
        <input type="submit" name="btn" value="Edit">
    </form>
</body>
</html>

