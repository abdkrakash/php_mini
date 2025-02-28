<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $target_dir = "uploads/";
    $target_file = "";

    if (!empty($_FILES["image"]["name"])) {
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
            $target_file = ""; 
        }
    }

   
    $sql = "INSERT INTO juices(name, price, image, category_id) VALUES ('$name', '$price', '$target_file','$category_id')";
    $conn->query($sql);

    header('Location: index.php');
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
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #ff6f00;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
            color: #444;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #ff6f00;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-top: 15px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #e65c00;
        }

        .back-link {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: #ff6f00;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Create Juice</h2>
        <form method="post" enctype="multipart/form-data">

            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>

            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price"><br>

            <label for="image">Image:</label><br>
            <input type="file" placeholder="upload your image" name="image" id="image"><br>

            <label for="category_id">Category_ID:</label><br>
            <input type="text" id="category_id" name="category_id"><br>

            <button type="submit">Create Juice</button>

        </form>
    </div>
</body>
</html>