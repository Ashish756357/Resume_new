<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input data
    $name = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $subject = $conn->real_escape_string(trim($_POST['subject']));
    $message = $conn->real_escape_string(trim($_POST['message']));

    $sql = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully. <a href='landing page.php'>Go Back</a>";
    } else {
        echo "Error inserting message: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
