<?php
// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root";  // Your database username (default in XAMPP)
$password = "";      // Your database password (default in XAMPP)
$dbname = "hospital_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Check if username exists
    $sql = "SELECT * FROM users WHERE username = '$user' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $storedPassword = $row['password'];

        // Verify password
        if (password_verify($pass, $storedPassword)) {
            // Start session for the logged-in user
            $_SESSION['username'] = $user;

            // If username is "admin", redirect to admin panel
            if ($user == 'admin') {
                header("Location: admin_dashboard.php"); // Redirect to admin panel
                exit();
            } else {
                // Redirect to User directory after login
                header("Location: /Care Compass Hospital/Care Compass Hospital/User/home.php");
                exit();
            }
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Username does not exist!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Compass Hospitals - Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f8ff;
        }

        .login-form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-form h2 {
            text-align: center;
            color: #007aff;
        }

        .login-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-form button {
            width: 100%;
            padding: 12px;
            background-color: #007aff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        .login-form button:hover {
            background-color: #005bb5;
        }

        .login-form p {
            text-align: center;
        }

        .login-form .error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .login-form a {
            text-decoration: none;
            color: #007aff;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <form class="login-form" action="login.php" method="POST">
            <h2>Login to Care Compass Hospitals</h2>

            <?php
            if (isset($error)) {
                echo "<p class='error'>$error</p>";
            }
            ?>

            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>

            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>

    <footer>
        <p style="text-align: center; padding: 20px 0; background-color: #005bb5; color: white;">&copy; 2025 Care Compass Hospitals. All Rights Reserved.</p>
    </footer>

</body>
</html>
