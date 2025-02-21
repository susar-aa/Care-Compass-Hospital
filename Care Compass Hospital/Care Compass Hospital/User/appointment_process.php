<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $doctor_id = $_POST['doctor'];
    $branch_name = trim($_POST['branch_name']); // Correct variable name
    $appointment_date = $_POST['date'];
    $patient_name = $_POST['patient_name'];
    $contact = $_POST['contact'];

    // Establish database connection
    $conn = new mysqli('localhost', 'root', '', 'hospital_db');

    // Check connection
    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // Fetch branch ID based on branch_name (updated column name)
    $sql_branch = "SELECT id FROM branches WHERE branch_name = '$branch_name'";
    $result_branch = $conn->query($sql_branch);

    if ($result_branch->num_rows > 0) {
        $branch_row = $result_branch->fetch_assoc();
        $branch_id = $branch_row['id'];

        // Insert appointment data into the database
        $sql_appointment = "INSERT INTO appointments (doctor_id, branch_id, appointment_date, patient_name, contact_number)
                            VALUES ('$doctor_id', '$branch_id', '$appointment_date', '$patient_name', '$contact')";

        if ($conn->query($sql_appointment) === TRUE) {
            // Success message with user-friendly display
            echo "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Appointment Confirmation</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        background-color: #f0f8ff;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                    }
                    .message-box {
                        text-align: center;
                        background-color: #ffffff;
                        padding: 20px;
                        border-radius: 10px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    }
                    .message-box h2 {
                        color: #007bff;
                        margin-bottom: 10px;
                    }
                    .message-box p {
                        font-size: 16px;
                        margin-bottom: 20px;
                    }
                    .message-box button {
                        padding: 10px 20px;
                        font-size: 16px;
                        border: none;
                        border-radius: 5px;
                        background-color: #007bff;
                        color: #ffffff;
                        cursor: pointer;
                    }
                    .message-box button:hover {
                        background-color: #0056b3;
                    }
                </style>
            </head>
            <body>
                <div class='message-box'>
                    <h2>Appointment Booked Successfully!</h2>
                    <p>Your appointment has been booked. Thank you for choosing our services.</p>
                    <button onclick=\"window.location.href='home.php'\">Go to Homepage</button>
                </div>
            </body>
            </html>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Branch not found! Please make sure the branch name is correct.";
    }

    // Close the connection
    $conn->close();
}
?>
