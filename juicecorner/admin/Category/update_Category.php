<?php
include 'db_config.php';

// Check if Category_ID is set in the URL
if (isset($_GET['Category_ID'])) {
    $category_id = $_GET['Category_ID'];

    // Fetch category data securely using prepared statements
    $stmt = $conn->prepare("SELECT * FROM categories WHERE Category_ID = :Category_ID");
    $stmt->bindParam(':Category_ID', $category_id, PDO::PARAM_INT);
    $stmt->execute();
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if category exists
    if (!$category) {
        echo "Category not found.";
        exit;
    }
} else {
    echo "Invalid category ID.";
    exit;
}

// Handle form submission for updating category
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $name = $_POST['name'];
    $image = $_POST['image'];

    // Update category query using prepared statements
    $stmt = $conn->prepare("UPDATE categories SET Category_name = :name, image = :image WHERE Category_ID = :Category_ID");
    $stmt->bindParam(':Category_ID', $category_id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);

    // Execute the query and check for success
    if ($stmt->execute()) {
        // Redirect to categories list page after successful update
        header("Location: read_Category.php");
        exit;
    } else {
        echo "Error updating category.";
    }
}



?>

<?php include '../html/includes/top.php'; ?>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Sidebar -->
        <?php include '../html/includes/sidebar.php'; ?>

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <?php include '../html/includes/navbar.php'; ?>

            <div class="fluid-container m-4">
                <title>Edit Category</title>
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

                <h1>Edit Category</h1>

                <!-- Form to update the category -->
                <form method="POST">
                    <input type="hidden" name="update" value="1">
                    <input type="hidden" name="Category_ID" value="<?php echo $category['Category_ID']; ?>">

                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($category['Category_name']); ?>" required>
                    </div>

                    

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../html/includes/end.php'; ?>
