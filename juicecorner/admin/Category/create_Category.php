<?php
include 'db_config.php';

$stmt = $conn->query("SELECT * FROM categories");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $Category_name = $_POST['Category_name'];
    $image = $_POST['image'];

    $stmt = $conn->prepare("INSERT INTO categories (Category_name, image) VALUES (?, ?)");
    $stmt->execute([$Category_name, $image]);

    header("Location: read_Category.php");
    exit();
}

?>
 <?php include '../html/includes/top.php'; ?>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include '../html/includes/sidebar.php'; ?>
      
        <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
          <!-- Navbar -->


<div class="fluid-container m-4">

    <title>Create Category</title>

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

</head>
<body>
    <h1>Create New Category</h1>
    <form method="POST" action="">
        <input type="hidden" name="create" value="1">
        
        <label for="Category_name">Category_name:</label>
        <input type="text" id="Category_name" name="Category_name" required><br>

       
    
        <input type="submit" value="Create Category">
    </form>
    <br>
</body>
</html>
<?php include '../html/includes/end.php'; ?>
