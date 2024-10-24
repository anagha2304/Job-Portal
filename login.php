<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='employer'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['employer'] = $username;
        header('Location: employer_dashboard.php');
    } else {
        $error = "Invalid login details!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Login</title>
</head>
<body>
    <form method="POST">
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
        <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    </form>
</body>
</html>
