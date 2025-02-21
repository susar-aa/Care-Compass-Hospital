<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'hospital_db';

$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    // Insert data into the feedback table
    $query = "INSERT INTO feedback (name, email, rating, review) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ssis', $name, $email, $rating, $review);

    if ($stmt->execute()) {
        echo "<script>alert('Thank you for your feedback!'); window.location.href = 'feedback.php';</script>";
    } else {
        echo "<script>alert('Failed to submit feedback. Please try again.'); window.location.href = 'feedback.php';</script>";
    }

    $stmt->close();
}

$mysqli->close();
?>
