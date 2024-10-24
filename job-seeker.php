<?php
include('db_connect.php');
$sql = "SELECT * FROM jobs";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Available Jobs</h1>
        </header>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="job-card">
                <h3><?php echo $row['job_title']; ?></h3>
                <p>Company: <?php echo $row['company_name']; ?></p>
                <p>Location: <?php echo $row['location']; ?></p>
                <p>Description: <?php echo $row['job_description']; ?></p>
                <button>Apply Now</button>
            </div>
        <?php } ?>
        <a href="index.php" class="back-button">Back to Home</a>
    </div>
</body>
</html>
