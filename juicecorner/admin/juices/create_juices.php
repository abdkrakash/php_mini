<?php
include 'db_config.php'; // تأكد من أن هذا الملف يحتوي على اتصال قاعدة البيانات

// جلب أسماء الفئات من قاعدة البيانات
$stmt = $conn->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    // معالجة تحميل الصورة
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/"; // المجلد الذي سيتم حفظ الصور فيه
        $target_file = $target_dir . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // التحقق من أن الملف هو صورة
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check !== false) {
            // نقل الملف إلى المجلد المحدد
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $image = $target_file; // حفظ مسار الصورة
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit();
            }
        } else {
            echo "File is not an image.";
            exit();
        }
    } else {
        echo "No image uploaded.";
        exit();
    }

    // إدراج بيانات العصير في قاعدة البيانات
    $stmt = $conn->prepare("INSERT INTO juices (Name, Price, image, Category_ID) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $price, $image, $category_id]);

    // إعادة التوجيه إلى صفحة عرض العصائر بعد الإدراج
    header("Location: read_juices.php");
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
            <?php include '../html/includes/navbar.php'; ?>
            <!-- / Navbar -->

            <div class="container-fluid m-4">
                <h1>Create New Juice</h1>
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="create" value="1">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category:</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo htmlspecialchars($category['Category_ID']); ?>">
                                    <?php echo htmlspecialchars($category['Category_name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Juice</button>
                </form>
            </div>
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<?php include '../html/includes/end.php'; ?>