<?php
include 'db_config.php';

$target_dir = "uploads/";
$target_file = "";

if (!isset($_GET['id'])) {
    die('Error: ID not found');
}

$id = $_GET['id'];


$sql = "SELECT * FROM juices WHERE Juice_ID = :id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
$juice = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$juice) {
    
    die('Error: Juice not found');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];


    if (!empty($_FILES["image"]["name"])) {
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
            $target_file = ""; 
        }
    }

  
    $sql = "UPDATE juices SET Name = :name, Price = :price, image = :image, Category_ID = :category_id WHERE Juice_ID = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':price' => $price,
        ':image' => $target_file,
        ':category_id' => $category_id,
        ':id' => $id
    ]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Juice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
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
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #ff6f00;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-weight: bold;
            text-align: left;
            display: block;
        }

        input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }

        button {
            background-color: #ff6f00;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
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

        .preview-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Juice</h2>

        <form method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($juice['Name']) ?>" required>

            <label for="price">Price:</label>
            <input type="text" name="price" id="price" value="<?= htmlspecialchars($juice['Price']) ?>" required>

            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
            <img src="<?php echo $juice['image'] ?>" class="preview-img">

            <label for="category_id">Category ID:</label>
            <input type="text" name="category_id" id="category_id" value="<?= htmlspecialchars($juice['Category_ID']) ?>" required>

            <button type="submit">Update Juice</button>
        </form>

        <a class="back-link" href="index.php">Back to List</a>
    </div>
</body>
</html>
