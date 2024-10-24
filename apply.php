<?php
include 'config.php';
session_start();

$job_id = $_GET['job_id'];
$seeker_id = 1; // Assume logged-in job seeker

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cover_letter = $_POST['cover_letter'];
    $sql = "INSERT INTO applications (job_id, seeker_id, cover_letter) VALUES ('$job_id', '$seeker_id', '$cover_letter')";
    $conn->query($sql);
    echo "Application submitted!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Job</title>
</head>
<body>
    <form method="POST">
        <label>Cover Letter:</label>
        <textarea name="cover_letter" required></textarea>
        <button type="submit">Submit Application</button>
    </form>
</body>
</html>
