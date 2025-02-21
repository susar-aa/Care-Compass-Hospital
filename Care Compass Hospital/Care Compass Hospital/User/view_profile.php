<?php
// Start session
session_start();

// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'hospital_db';

$mysqli = new mysqli($host, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details
$username = $_SESSION['username'];
$query = "SELECT username, email, profile_picture FROM users WHERE username = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("User not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile - Care Compass Hospitals</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Assets/favicon16.png">
    <style>
        /* General Body Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Profile Card Styling */
        .profile-card {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 30px;
        }

        /* Profile Picture Styling */
        .profile-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #007aff;
        }

        /* Profile Information Styling */
        .profile-card h2 {
            margin-top: 15px;
            font-size: 24px;
            color: #007aff;
        }

        .profile-card p {
            font-size: 16px;
            color: #555;
            margin: 5px 0;
        }

        /* Button Styling */
        .profile-card .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007aff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .profile-card .btn:hover {
            background-color: #005bb5;
        }

        .btn-logout {
            background: #dc3545;
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="profile-card">
        <img src="<?php echo $user['profile_picture'] ?: 'defaultprofile.png'; ?>" alt="Profile Picture">
        <h2><?php echo $user['username']; ?></h2>
        <p>Email: <?php echo $user['email']; ?></p>
        <a href="edit_profile.php" class="btn" >Edit Profile</a>
        <a href="../index.php" class="btn btn-logout" style="background: #dc3545;">Logout</a>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>