
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback & Reviews</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Assets/favicon16.png">
    <link rel="stylesheet" href="styles.css">
<style>
    /* Feedback Form */
.feedback-form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.feedback-form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #007aff;
}

.feedback-form input,
.feedback-form select,
.feedback-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.feedback-form button {
    background-color: #007aff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.feedback-form button:hover {
    background-color: #005bb5;
}

/* Reviews Section */
.reviews-section {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
}

.review-card {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.review-card h3 {
    margin: 0;
    font-size: 18px;
    color: #333;
}

.review-card p {
    margin: 5px 0;
    font-size: 14px;
    color: #555;
}

.review-card .review-date {
    font-size: 12px;
    color: #888;
    margin-top: 10px;
}


/* Basic Feedback Section */
.feedback-section {
    width: 100%;
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Feedback Heading */
.feedback-section h2 {
    text-align: center;
    font-size: 1.5rem;
    color: #333;
}

/* Individual Feedback Box */
.feedback {
    padding: 15px;
    margin-bottom: 15px;
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

/* Feedback Header with Name and Date */
.feedback-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 0px;
}

.feedback-author {
    font-size: 1rem;
    color: #333;
}

.feedback-date {
    font-size: 0.9rem;
    color: #777;
}

/* Feedback Text */
.feedback-text {
    font-size: 1rem;
    color: #555;
    margin-top: 0px;
}

</style>
</head>
<body>
<?php include 'navbar.php'; ?>

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
?>

    <div class="container">
        <h1 style="text-align: center;">Feedback & Reviews</h1>
        <p style="text-align: center;">We value your feedback. Please leave a review about your experience with us.</p>

        <form method="POST" action="submit_feedback.php" class="feedback-form">
    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required placeholder="Enter your name">

    <label for="email">Your Email:</label>
    <input type="email" id="email" name="email" required placeholder="Enter your email">

    <label for="rating">Your Rating:</label>
    <select id="rating" name="rating" required>
        <option value="5">Excellent (5 Stars)</option>
        <option value="4">Very Good (4 Stars)</option>
        <option value="3">Good (3 Stars)</option>
        <option value="2">Fair (2 Stars)</option>
        <option value="1">Poor (1 Star)</option>
    </select>

    <label for="review">Your Feedback:</label>
    <textarea id="review" name="review" rows="5" required placeholder="Write your feedback here"></textarea>

    <button type="submit">Submit Feedback</button>
</form>

<div class="feedback-section">
<h2 style="padding-top: 0px;margin-top: 0px;">User Feedback</h2>
    <?php
    // Database connection
    $mysqli = new mysqli($host, $username, $password, $dbname);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Fetch feedback from the database
    $query = "SELECT * FROM feedback ORDER BY created_at DESC";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "
                <div class='feedback'>
                    <div class='feedback-header'>
                        <div class='feedback-author'>" . htmlspecialchars($row['name']) . "</div>
                        <div class='feedback-date'>" . htmlspecialchars($row['created_at']) . "</div>
                    </div>
                    <p class='feedback-text'>" . nl2br(htmlspecialchars($row['review'])) . "</p>
                </div>
            ";
        }
    } else {
        echo "<p>No feedback available.</p>";
    }

    $mysqli->close();
    ?>
</div>

            