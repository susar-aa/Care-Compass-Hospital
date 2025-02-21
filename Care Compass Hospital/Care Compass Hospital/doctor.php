<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors and Staff Profiles</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../Care Compass Hospital/Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Care Compass Hospital/Assets/favicon16.png">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General Styling for Profiles */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #f0f1f6;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007aff;
        }

        .profiles-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .profile-card {
            background-color: white;
            width: 300px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            transition: transform 0.2s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
        }

        .profile-card img.profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
            object-fit: cover;
        }

        .profile-card h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        .profile-card p {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Meet Our Team</h1>
        <div class="profiles-container">
            <?php
            // Database connection
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'hospital_db';

            $mysqli = new mysqli($host, $username, $password, $dbname);

            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            // Fetch profiles
            $query = "SELECT * FROM profiles";
            $result = $mysqli->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Prepend 'uploads/' to the profile_picture path if images are stored in the 'uploads' folder
                    $imagePath = "/Care Compass Hospital/Admin Panel/" . $row['profile_picture'];

                    echo "
                    <div class='profile-card'>
                        <img src='$imagePath' alt='" . $row['name'] . "' class='profile-picture'>
                        <h3>" . $row['name'] . "</h3>
                        <p><strong>Specialty:</strong> " . $row['specialty'] . "</p>
                        <p><strong>Qualifications:</strong> " . $row['qualifications'] . "</p>
                        <p><strong>Contact:</strong> " . $row['contact_info'] . "</p>
                    </div>
                    ";
                }
            } else {
                echo "<p>No profiles found.</p>";
            }

            $mysqli->close();
            ?>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
