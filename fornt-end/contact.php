<?php
include 'connection/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully. <a href='/Resume/landing page.php'>Go Back</a>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!-- contact-us.php -->
<div class="container" id="contact">
    <h2>Contact Us</h2>
    <form action="contact-process.php" method="post">
         <label for="name">Name:</label><br>
         <input type="text" id="name" name="name" required><br><br>
         
         <label for="email">Email:</label><br>
         <input type="email" id="email" name="email" required><br><br>
         
         <label for="subject">Subject:</label><br>
         <input type="text" id="subject" name="subject" required><br><br>
         
         <label for="message">Message:</label><br>
         <textarea id="message" name="message" rows="4" required></textarea><br><br>
         
         <input type="submit" value="Send Message">
    </form>
</div>