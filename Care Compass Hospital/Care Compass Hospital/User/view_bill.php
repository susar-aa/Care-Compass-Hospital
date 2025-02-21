<html>
<title>Care Compass Hospital
</title>
<link rel="icon" type="image/png" sizes="32x32" href="../Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Assets/favicon16.png">
<head>
<style>
/* General Styles */
/* General Styling */
body {
    font-family: 'Helvetica Neue', sans-serif; /* iOS system font */
    background-color: #f0f1f6; /* Soft iOS background color */
    margin: 0;
    padding: 0;
    color: #333;
}

/* Header */
header {
    background-color: #007aff; /* iOS Blue */
    color: white;
    text-align: center;
    padding: 15px;
    font-size: 20px;
    font-weight: 600;
    border-radius: 0 0 20px 20px;
}

/* Main Container */
.container {
    width: 90%;
    max-width: 650px;
    margin: 40px auto;
    padding: 20px;
    background-color: white;
    border-radius: 20px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

/* Form Styling */
form {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
}

form label {
    font-size: 16px;
    margin-bottom: 8px;
    color: #333;
}

form input[type="text"] {
    padding: 15px;
    border-radius: 12px;
    border: 1px solid #ccc;
    font-size: 16px;
    margin-bottom: 20px;
    background-color: #f7f7f7;
    transition: border-color 0.3s ease;
}

form input[type="text"]:focus {
    outline: none;
    border-color: #007aff; /* Blue border on focus */
}

form button {
    background-color: #007aff; /* iOS Blue */
    color: white;
    padding: 16px;
    border: none;
    border-radius: 12px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #005ac1;
}

/* Bill Details Card */
.bill-card {
    background-color: white;
    padding: 20px;
    margin: 20px 0;
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.bill-card h3 {
    font-size: 22px;
    margin-bottom: 10px;
}

.bill-card p {
    font-size: 16px;
    margin-bottom: 10px;
    color: #555;
}

.bill-card .bill-info {
    margin-bottom: 20px;
    font-size: 16px;
}

.bill-card .bill-info span {
    font-weight: bold;
}

.payment-button {
    background-color: #34c759; /* Green button for "Pay Now" */
    color: white;
    padding: 18px;
    border: none;
    border-radius: 12px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
    margin-top: 20px;
}

.payment-button:hover {
    background-color: #28a745;
}

/* Error Message */
.error-message {
    color: #ff3b30; /* iOS Red */
    font-size: 16px;
    margin-top: 20px;
    text-align: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        width: 95%;
        padding: 15px;
    }

    form input[type="text"], form button {
        width: 100%;
    }

    .bill-card {
        padding: 15px;
    }
}

/* Bill Details Card */
.bill-card {
    background-color: white;
    padding: 20px;
    margin: 20px 0;
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Ensures content is spaced out */
    height: 300px; /* Set a fixed height for the card */
}

.bill-card:hover {
    transform: translateY(-5px);
}

.bill-card h3 {
    font-size: 22px;
    margin-bottom: 10px;
}

.bill-card p {
    font-size: 16px;
    margin-bottom: 10px;
    color: #555;
}

.bill-card .bill-info {
    margin-bottom: 20px;
    font-size: 16px;
}

.bill-card .bill-info span {
    font-weight: bold;
}

/* Bill Amount */
.bill-amount {
    font-size: 24px; /* Larger font for the amount */
    font-weight: bold;
    color: #007aff; /* iOS Blue color for emphasis */
    margin-top: auto; /* Pushes the amount to the bottom of the card */
}
/* Table Styling */
.paid-bills-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.paid-bills-table th,
.paid-bills-table td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.paid-bills-table th {
    background-color: #f7f7f7;
    font-weight: bold;
    color: #333;
}

.paid-bills-table tbody tr:hover {
    background-color: #f1f1f1;
}

.paid-bills-table td {
    font-size: 16px;
}

/* Container Styling */
.container {
    margin-top: 20px;
    background-color: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>



    
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bill - Care Compass Hospital</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your updated external CSS file -->
</head>
<body>

<?php include 'navbar.php'; ?>
    <header>
        Care Compass Hospital - Bill Details
    </header>

    <div class="container">
        <h2>Enter Phone Number or NIC</h2>
        
        <!-- Form for entering contact number or NIC -->
        <form action="view_bill.php" method="POST">
            <label for="contact_number_or_nic">Enter Phone Number or NIC:</label>
            <input type="text" name="contact_number_or_nic" id="contact_number_or_nic" required>
            <button type="submit">Submit</button>
        </form>

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact_number_or_nic = $_POST['contact_number_or_nic'];

    // Query to fetch unpaid or pending bills
    $query = "SELECT * FROM bills WHERE (phone_number = ? OR nic = ?) AND (payment_status = 'Pending' OR payment_status = 'Unpaid')";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $contact_number_or_nic, $contact_number_or_nic);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<div class='container'>";
    echo "<h2>Pending or Unpaid Bills</h2>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='bill-card'>
                    <h3>Bill Details</h3>
                    <p><span>Bill ID:</span> " . $row['bill_id'] . "</p>
                    <p><span>Patient Name:</span> " . $row['patient_name'] . "</p>
                    <p><span>Amount Due:</span> LKR " . $row['amount_due'] . "</p>
                    <p><span>Payment Status:</span> " . $row['payment_status'] . "</p>
                    <div class='bill-amount'>LKR " . $row['amount_due'] . "</div> <!-- Bill amount at bottom with larger font -->
                  </div>";

            echo "<form action='process_payment.php' method='POST'>
                    <input type='hidden' name='bill_id' value='" . $row['bill_id'] . "'>
                    <button type='submit' class='payment-button'>Pay Now</button>
                  </form>";
        }
    } else {
        echo "<p class='error-message'>No unpaid or pending records found for the given phone number or NIC.</p>";
    }

    echo "</div>";

    // Query to fetch paid bill history
    $query = "SELECT * FROM bills WHERE (phone_number = ? OR nic = ?) AND payment_status = 'Paid'";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $contact_number_or_nic, $contact_number_or_nic);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<div class='container'>";
    echo "<h2>Paid Bill History</h2>";

    if ($result->num_rows > 0) {
        echo "<table class='paid-bills-table'>
                <thead>
                    <tr>
                        <th>Bill ID</th>
                        <th>Patient Name</th>
                        <th>Amount Paid (LKR)</th>
                        <th>Payment Date</th>
                    </tr>
                </thead>
                <tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['bill_id'] . "</td>
                    <td>" . $row['patient_name'] . "</td>
                    <td>LKR " . $row['amount_due'] . "</td>
                    <td>" . ($row['payment_date'] ?? 'N/A') . "</td>
                  </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='error-message'>No paid bills found for the given phone number or NIC.</p>";
    }

    echo "</div>";

    $stmt->close();
    $mysqli->close();
}
?>


                
    </div>

</body>
</html>


