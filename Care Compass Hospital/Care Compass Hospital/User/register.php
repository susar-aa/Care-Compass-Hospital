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
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirmPass = $_POST['confirm_password'];

    // Check if passwords match
    if ($pass != $confirmPass) {
        $error = "Passwords do not match!";
    } else {
        // Check if username or email already exists in the database
        $sql = "SELECT * FROM users WHERE username = '$user' OR email = '$email' LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $error = "Username or email already exists!";
        } else {
            // Hash the password before storing it
            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

            // Insert new user into the database
            $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$hashedPassword')";

            if ($conn->query($sql) === TRUE) {
                // Redirect to login page after successful registration
                header("Location: login.php");
                exit();
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Compass Hospitals - Register</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Assets/favicon16.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
        }

        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f8ff;
        }

        .register-form {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .register-form h2 {
            text-align: center;
            color: #007aff;
        }

        .register-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .register-form button {
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

        .register-form button:hover {
            background-color: #005bb5;
        }

        .register-form p {
            text-align: center;
        }

        .register-form .error {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .register-form a {
            text-decoration: none;
            color: #007aff;
        }
    </style>
</head>
<body>

    <div class="register-container">
        <form class="register-form" action="register.php" method="POST">
            <h2>Register to Care Compass Hospitals</h2>

            <?php
            if (isset($error)) {
                echo "<p class='error'>$error</p>";
            }
            ?>

            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Register</button>

            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>

    <footer>
        <p style="text-align: center; padding: 20px 0; background-color: #005bb5; color: white;">&copy; 2025 Care Compass Hospitals. All Rights Reserved.</p>
    </footer>

</body>
</html>
