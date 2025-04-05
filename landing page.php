<?php include 'connection/db.php'; ?>
<?php
$sql = "SELECT * FROM resume_info LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Resume</title>
    <link rel="stylesheet" href="asset/landing.css">
</head>
<body>

<nav>
    <a href="#home">Home</a>
    <a href="#projects">Projects</a>
    <a href="<?php echo $row['github_link']; ?>" target="_blank">GitHub</a>
    <a href="<?php echo $row['leetcode_link']; ?>" target="_blank">LeetCode</a>
    <a href="<?php echo $row['resume_link']; ?>" target="_blank">Resume</a>
</nav>

<div class="container" id="home">
    <h1><?php echo $row['full_name']; ?></h1>
    <p><?php echo nl2br($row['about']); ?></p>
</div>

<div class="container" id="projects">
    <h2>Projects</h2>
    <p><?php echo nl2br($row['projects']); ?></p>
</div>

<div class="container">
    <a href="update-form.php">[Edit Resume Info]</a>
</div>

</body>
</html>
