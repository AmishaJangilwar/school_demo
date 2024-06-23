<?php
require 'db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $class_id = $_POST['class_id'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if ($image) {
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $stmt = $conn->prepare("UPDATE student SET name = ?, email = ?, address = ?, class_id = ?, image = ? WHERE id = ?");
        $stmt->execute([$name, $email, $address, $class_id, $image, $id]);
    } else {
        $stmt = $conn->prepare("UPDATE student SET name = ?, email = ?, address = ?, class_id = ? WHERE id = ?");
        $stmt->execute([$name, $email, $address, $class_id, $id]);
    }
    header("Location: index.php");
}

$stmt = $conn->prepare("SELECT * FROM student WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

$stmt = $conn->prepare("SELECT * FROM classes");
$stmt->execute();
$classes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form method="POST" enctype
