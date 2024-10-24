<?php
include 'config.php';
$sql = "SELECT jobs.title, jobs.description, jobs.location, users.username AS company FROM jobs JOIN users ON jobs.employer_id = users.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Jobs</title>
</head>
<body>
    <h1>Job Listings</h1>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="job-card">
            <h2><?php echo $row['title']; ?></h2>
            <p><?php echo $row['description']; ?></p>
            <p><strong>Company:</strong> <?php echo $row['company']; ?></p>
            <p><strong>Location:</strong> <?php echo $row['location']; ?></p>
            <a href="apply.php?job_id=<?php echo $row['id']; ?>">Apply Now</a>
        </div>
    <?php endwhile; ?>
</body>
</html>
