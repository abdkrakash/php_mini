<?php
include 'db_config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image=$_POST['image'];
    $category_id=$_POST['category_id'];

    $sql="INSERT INTO juices (Name,Price,image,Category_ID) VALUES ('$name','$price','$image','$category_id')";
    $conn->query($sql);

    header('Location:index.php');
    exit;
        
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"], input[type="email"], textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>


    <div class="container">
        <h2>Create Juice</h2>
        <form method="post">

            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>

            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price"><br>

            <label for="image">Image:</label><br>
            <input type="file" id="image" name="image"><br>

            <label for="category_id">Category_ID:</label><br>
            <input type="text" id="category_id" name="category_id"><br>

            <button type="submit">Create Juice</button>

        </form>
    </div>
</body>
</html>