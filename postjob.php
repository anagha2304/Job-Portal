<?php
session_start();
include 'config.php';

if (!isset($_SESSION['employer'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $employer = $_SESSION['employer'];

    $sql = "INSERT INTO jobs (employer_id, title, description, location) VALUES (
                (SELECT id FROM users WHERE username='$employer'), '$title', '$description', '$location')";
    $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['employer']; ?></h1>
    <h2>Post a Job</h2>
    <form method="POST">
        <label>Job Title:</label>
        <input type="text" name="title" required>
        <label>Job Description:</label>
        <textarea name="description" required></textarea>
        <label>Location:</label>
        <input type="text" name="location" required>
        <button type="submit">Post Job</button>
    </form>
</body>
</html>
