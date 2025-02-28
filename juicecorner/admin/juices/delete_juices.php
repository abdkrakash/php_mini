<?php
include 'db_config.php'; // تأكد من أن هذا الملف يحتوي على اتصال قاعدة البيانات

// التحقق من وجود Juice_ID في الرابط
if (isset($_GET['Juice_ID']) && is_numeric($_GET['Juice_ID'])) {
    $juice_id = $_GET['Juice_ID'];

    // إعداد وتنفيذ استعلام الحذف
    $stmt = $conn->prepare("DELETE FROM juices WHERE Juice_ID = :Juice_ID");
    $stmt->bindParam(':Juice_ID', $juice_id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        // إعادة التوجيه إلى صفحة عرض العصائر بعد الحذف
        header("Location: read_juices.php");
        exit();
    } else {
        echo "Error deleting the juice.";
    }
} else {
    echo "Invalid Juice ID.";
    exit();
}
?>