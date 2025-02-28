<?php
include 'db_config.php';

$sql="SELECT * FROM juices";
$stmt=$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>juices</title>
    <style>
        table { width: 50%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn { padding: 5px 10px; text-decoration: none; margin: 2px; display: inline-block; }
        .btn-create { background-color: green; color: white; }
        .btn-Edit { background-color: orange; color: white; }
        .btn-delete { background-color: red; color: white; }
    </style>
</head>
<body>
   <h2>Juices</h2>
    <a  class="btn btn-create" href="create.php" >Create</a> 
    <table>
        <tr>
            <th>Juice_ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>image</th>
            <th>Category_ID</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
            <td><?=htmlspecialchars($row['Juice_ID'])?></td>
            <td><?=htmlspecialchars($row['Name'])?></td>
            <td><?=htmlspecialchars($row['Price'])?></td>
            <td><?=htmlspecialchars($row['image'])?></td>
            <td><?=htmlspecialchars($row['Category_ID'])?></td>

            <td><a class="btn btn-Edit" href="Edit.php?id=<?=htmlspecialchars($row['Juice_ID'])?>">Edit</a></td>

            <td><a class="btn btn-delete" href="delete.php?id=<?=htmlspecialchars($row['Juice_ID'])?>">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

