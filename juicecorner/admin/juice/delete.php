<?php
include 'db_config.php';

if (!isset($_GET['id'])) {
    die('Error: ID not found');
}
 $id = $_GET['id'];
 $sql = "DELETE FROM juices WHERE Juice_ID = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
 $stmt->execute([':id' => $id]);

$conn->query("SET @count = 0");
$conn->query("UPDATE juices SET Juice_ID = @count:= @count + 1");
$conn->query("ALTER TABLE juices AUTO_INCREMENT = 1");

header('Location: index.php');
exit;
?>


