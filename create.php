<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $class_id = $_POST['class_id'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $stmt = $conn->prepare("INSERT INTO student (name, email, address, class_id, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $address, $class_id, $image]);
        header("Location: index.php");
    } else {
        echo "Failed to upload image";
    }
}

$stmt = $conn->prepare("SELECT * FROM classes");
$stmt->execute();
$classes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
</head>
<body>
    <h1>Create Student</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="address">Address:</label>
        <textarea name="address" required></textarea><br>

        <label for="class_id">Class:</label>
        <select name="class_id">
            <?php foreach($classes as $class): ?>
            <option value="<?php echo $class['class_id']; ?>"><?php echo $class['name']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/jpeg, image/png" required><br>

        <button type="submit">Create</button>
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>
<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $class_id = $_POST['class_id'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $stmt = $conn->prepare("INSERT INTO student (name, email, address, class_id, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $address, $class_id, $image]);
        header("Location: index.php");
    } else {
        echo "Failed to upload image";
    }
}

$stmt = $conn->prepare("SELECT * FROM classes");
$stmt->execute();
$classes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
</head>
<body>
    <h1>Create Student</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="address">Address:</label>
        <textarea name="address" required></textarea><br>

        <label for="class_id">Class:</label>
        <select name="class_id">
            <?php foreach($classes as $class): ?>
            <option value="<?php echo $class['class_id']; ?>"><?php echo $class['name']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/jpeg, image/png" required><br>

        <button type="submit">Create</button>
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>
