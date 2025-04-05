<?php include 'connection/db.php'; ?>
<?php
$sql = "SELECT * FROM resume_info ";
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

<!-- <div class="container">
    <a href="update-form.php">[Edit Resume Info]</a>
</div> -->

<!-- Include the Contact Module -->
<?php include 'fornt-end/contact.php'; ?>

<!-- JavaScript to add fade-in effect on scroll -->
<script>
    // Use Intersection Observer to add 'visible' class when a container is in view
    const observerOptions = {
        threshold: 0.2
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                // Optionally, unobserve the element after it becomes visible
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Target all containers
    document.querySelectorAll('.container').forEach(container => {
        observer.observe(container);
    });
</script>

</body>
</html>