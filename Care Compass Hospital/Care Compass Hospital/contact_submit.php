<?php
// Database configuration
$servername = "localhost"; // Replace with your DB server
$username = "root";        // Replace with your DB username
$password = "";            // Replace with your DB password
$dbname = "hospital_db";   // Replace with your database name

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $message = $conn->real_escape_string(trim($_POST['message']));

    // Insert query
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // If successful, show overlay message and redirect
        echo "<script>
                alert('Thank you! Your message has been submitted successfully.');
                window.location.href = 'contact.php'; // Redirect back to Contact Us page
              </script>";
    } else {
        echo "<script>
                alert('Error: Unable to submit your message. Please try again.');
                window.location.href = 'contact.php'; // Redirect back to Contact Us page
              </script>";
    }
}

// Close the connection
$conn->close();
?>
