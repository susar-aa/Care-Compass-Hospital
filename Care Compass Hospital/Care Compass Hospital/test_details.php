<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Details</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../Care Compass Hospital/Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Care Compass Hospital/Assets/favicon16.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f8ff;
            color: #333;
        }

        .test-check-container {
            max-width: 500px;
            margin: 20px auto;
            background-color: #f0f8ff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .test-check-container h2 {
            text-align: center;
            color: #007aff;
        }

        #test-check-form {
            display: flex;
            flex-direction: column;
        }

        #test-check-form label {
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        #test-check-form input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        #test-check-form button {
            padding: 10px;
            background-color: #007aff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        #test-check-form button:hover {
            background-color: #005bb5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #007aff;
            color: white;
        }

        .no-results {
            text-align: center;
            margin-top: 20px;
            color: red;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="test-check-container">
    <h2>Check Laboratory and Medical Test Details</h2>
    <form id="test-check-form" action="test_details.php" method="POST">
        <label for="identifier">Enter Phone Number or NIC:</label>
        <input type="text" id="identifier" name="identifier" placeholder="Phone Number or NIC" required>
        <button type="submit">Check Details</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the identifier from the form submission
    $identifier = trim($_POST['identifier']);

    // Check if the identifier is empty
    if (empty($identifier)) {
        echo "<p class='no-results'>Please provide a valid Phone Number or NIC.</p>";
    } else {
        // Establish database connection
        $conn = new mysqli('localhost', 'root', '', 'hospital_db');

        // Check connection
        if ($conn->connect_error) {
            die("Database connection failed: " . $conn->connect_error);
        }

        // Query to fetch test details
        $sql = "SELECT patient_name, test_name, test_date, test_result 
                FROM lab_tests 
                WHERE phone_number = ? OR nic = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $identifier, $identifier);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h2>Test Details</h2>";
            echo "<table>
                    <tr>
                        <th>Patient Name</th>
                        <th>Test Name</th>
                        <th>Test Date</th>
                        <th>Test Result</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['patient_name']}</td>
                        <td>{$row['test_name']}</td>
                        <td>{$row['test_date']}</td>
                        <td>{$row['test_result']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='no-results'>No test details found for the provided Phone Number or NIC.</p>";
        }

        // Close connection
        $stmt->close();
        $conn->close();
    }
}
?>
</body>
</html>
