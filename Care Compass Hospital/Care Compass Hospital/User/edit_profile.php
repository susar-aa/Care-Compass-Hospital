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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];

    // Handle profile picture upload
    if (!empty($_FILES['profile_picture']['name'])) {
        $target_dir = "Uploads/";
        $target_file = $target_dir . basename($_FILES['profile_picture']['name']);
        $upload_ok = 1;
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES['profile_picture']['tmp_name']);
        if ($check === false) {
            $upload_ok = 0;
        }

        // Check file size (limit to 2MB)
        if ($_FILES['profile_picture']['size'] > 2000000) {
            $upload_ok = 0;
        }

        // Allow only certain file formats
        if (!in_array($image_file_type, ['jpg', 'png', 'jpeg'])) {
            $upload_ok = 0;
        }

        // Upload file
        if ($upload_ok) {
            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {
                $profile_picture = $target_file;
            } else {
                die("Error uploading file.");
            }
        }
    } else {
        // Use existing profile picture if no new one is uploaded
        $profile_picture = $user['profile_picture'];
    }

    // Update user details
    $update_query = "UPDATE users SET username = ?, email = ?, profile_picture = ? WHERE username = ?";
    $update_stmt = $mysqli->prepare($update_query);
    $update_stmt->bind_param("ssss", $new_username, $new_email, $profile_picture, $username);

    if ($update_stmt->execute()) {
        // Update session username if changed
        $_SESSION['username'] = $new_username;
        header("Location: view_profile.php");
        exit();
    } else {
        die("Error updating profile: " . $mysqli->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Care Compass Hospitals</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Assets/favicon16.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .edit-profile-container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .edit-profile-container h2 {
            text-align: center;
            color: #007aff;
        }

        .edit-profile-container form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group img {
            max-width: 100px;
            margin-top: 10px;
            border-radius: 5px;
        }

        .btn-submit {
            background-color: #007aff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #005bb5;
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="edit-profile-container">
        <h2>Edit Profile</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="profile_picture">Profile Picture:</label>
                <input type="file" id="profile_picture" name="profile_picture">
                <?php if (!empty($user['profile_picture'])): ?>
                    <img src="<?php echo $user['profile_picture']; ?>" alt="Current Profile Picture">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn-submit">Save Changes</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
