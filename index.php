<?php
require 'db.php';

$stmt = $conn->prepare("SELECT student.id, student.name, student.email, student.created_at, student.image, classes.name AS class_name 
                        FROM student 
                        JOIN classes ON student.class_id = classes.class_id");
$stmt->execute();
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>School Demo</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Students</h1>
    <a href="create.php">Create Student</a>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Class</th>
            <th>Created At</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php foreach($students as $student): ?>
        <tr>
            <td><?php echo $student['name']; ?></td>
            <td><?php echo $student['email']; ?></td>
            <td><?php echo $student['class_name']; ?></td>
            <td><?php echo $student['created_at']; ?></td>
            <td><img src="uploads/<?php echo $student['image']; ?>" alt="Student Image" width="50"></td>
            <td>
                <a href="view.php?id=<?php echo $student['id']; ?>">View</a>
                <a href="edit.php?id=<?php echo $student['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $student['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
