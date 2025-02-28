<?php
include 'db_config.php';

$stmt = $conn->query("SELECT * FROM categories");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <?php include '../html/includes/navbar.php'; ?>
            <!-- / Navbar -->

            <div class="container-fluid m-4">
            <h1>Categorys</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $categories): ?>
                <tr>
                    <td><?php echo $categories['Category_ID']; ?></td>
                    <td><?php echo $categories['Category_name']; ?></td>
                 
                    <td>
                        <a class="btn btn-warning" href="update_category.php?Category_ID=<?php echo $categories['Category_ID']; ?>">Edit</a> 
                        <a class="btn btn-danger" href="delete_category.php?Category_ID=<?php echo $categories['Category_ID']; ?>" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
                <br>
            </div>
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<?php include '../html/includes/end.php'; ?>
