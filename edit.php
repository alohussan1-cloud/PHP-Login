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
$inputTitle = $_POST['title']??'';
$inputDescrip = $_POST['descrip']??'';

if(isset($_POST['btn'])){
    $inputTitle = $_POST['title'];
    $inputDescrip = $_POST['descrip'];
    
    $update = "UPDATE todo SET Title ='$inputTitle', Description = '$inputDescrip' where USER_ID = '$id'";
    
    $Query = mysqli_query($conn, $update);
    
    
    
    
    if(!empty($inputTitle) && !empty($inputDescrip)){
        
        if($Query){
            header("location: index.php");
        } else{
                echo "failed to edit";
        }
                
                
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
* {
    box-sizing: border-box;
}
body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #eef4f9;
}

form {
    width: 320px;
    margin: 70px auto;
    background: #ffffff;
    padding: 25px 22px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

h3 {
    margin-bottom: 20px;
    color: #222;
    font-weight: 600;
}

.field {
    margin-bottom: 15px;
}

label {
    display: block;
    font-size: 13px;
    color: #666;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #d0d7de;
    border-radius: 6px;
    font-size: 14px;
    transition: 0.2s;
}

input[type="text"]:focus {
    border-color: #4da6ff;
    box-shadow: 0 0 0 2px rgba(77,166,255,0.2);
}

input[type="submit"] {
    width: 100%;
    padding: 11px;
    background: linear-gradient(135deg, #4da6ff, #3b8edb);
    color: white;
    border: none;
    border-radius: 7px;
    font-size: 14px;
    cursor: pointer;
    transition: 0.2s;
}

input[type="submit"]:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(77,166,255,0.3);
}
textarea {
    width: 100%;
    height: 120px; /* good default */
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 8px;
    resize: vertical; /* user can expand if needed */
    outline: none;
    box-sizing: border-box;
}

textarea:focus {
    border-color: #4da6ff;
    box-shadow: 0 0 0 2px rgba(77,166,255,0.15);
}
</style>
<body>
    <form method="POST">
    <h3>Edit Form</h3>

    <div class="field">
        <label>Title</label>
        <input type="text" name="title" value="<?php echo $title ?>">
    </div>

    <div class="field">
        <label>Description</label>
        <textarea name="descrip"><?php echo $descrip ?></textarea>
    </div>

    <input type="submit" name="btn" value="Save Changes">
</form>
</body>
</html>

