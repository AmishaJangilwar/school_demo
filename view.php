<?php
require 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT student.*, classes.name AS class_name FROM student JOIN classes ON student.class_id = classes.class_id WHERE student.id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Student</title>
</head>
<body>
    <h1>View Student</h1>
    <p>Name: <?php echo $student['name']; ?></p>
    <p>Email: <?php echo $student['email']; ?></p>
    <p>Address: <?php echo $student['address']; ?></p>
    <p>Class: <?php echo $student['class_name']; ?></p>
    <p>Created At: <?php echo $student['created_at']; ?></p>
    <p><img src="uploads/<?php echo $student['image']; ?>" alt="Student Image" width="100"></p>
    <a href="index.php">Back to Home</a>
</body>
</html>
