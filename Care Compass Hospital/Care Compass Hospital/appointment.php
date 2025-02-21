<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../Care Compass Hospital/Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Care Compass Hospital/Assets/favicon16.png">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
        }

        .form-container {
            width: 100%;
            max-width: 500px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
        }

        .form-container label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container input, 
        .form-container select, 
        .form-container button {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container button {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>

    <div class="form-container">
        <h2>Book an Appointment</h2>
        <form action="appointment_process.php" method="POST">
            <label for="doctor">Doctor:</label>
            <select name="doctor" id="doctor" required>
                <?php
                // Connect to the database
                $conn = new mysqli('localhost', 'root', '', 'hospital_db');

                // Check connection
                if ($conn->connect_error) {
                    die("Database connection failed: " . $conn->connect_error);
                }

                // Fetch doctors dynamically
                $sql_doctors = "SELECT id, name, specialization FROM doctors";
                $result_doctors = $conn->query($sql_doctors);

                if ($result_doctors->num_rows > 0) {
                    while ($row = $result_doctors->fetch_assoc()) {
                        echo "<option value='{$row['id']}'>{$row['name']} ({$row['specialization']})</option>";
                    }
                } else {
                    echo "<option value=''>No doctors available</option>";
                }

                $conn->close();
                ?>
            </select>

            <label for="branch">Branch:</label>
            <select name="branch_name" id="branch" required>
                <?php
                // Reconnect to the database
                $conn = new mysqli('localhost', 'root', '', 'hospital_db');

                // Check connection
                if ($conn->connect_error) {
                    die("Database connection failed: " . $conn->connect_error);
                }

                // Fetch branches dynamically
                $sql_branches = "SELECT id, branch_name FROM branches";
                $result_branches = $conn->query($sql_branches);

                if ($result_branches->num_rows > 0) {
                    while ($row = $result_branches->fetch_assoc()) {
                        echo "<option value='{$row['branch_name']}'>{$row['branch_name']}</option>";
                    }
                } else {
                    echo "<option value=''>No branches available</option>";
                }

                $conn->close();
                ?>
            </select>

            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>

            <label for="patient_name">Patient Name:</label>
            <input type="text" name="patient_name" id="patient_name" required>

            <label for="contact">Contact Number:</label>
            <input type="text" name="contact" id="contact" required>

            <button type="submit">Book Appointment</button>
        </form>
    </div>
</body>
</html>
