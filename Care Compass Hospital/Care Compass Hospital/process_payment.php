<head>

<style>
/* General Styling */
body {
    font-family: 'Helvetica Neue', sans-serif; /* iOS system font */
    background-color: #f0f1f6; /* Soft iOS background */
    margin: 0;
    padding: 0;
    color: #333;
}

/* Form Container */
form {
    width: 90%;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    border-radius: 20px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: stretch;
}

/* Form Labels */
form label {
    font-size: 16px;
    color: #333;
    margin-bottom: 8px;
}

/* Input Fields */
form input[type="text"] {
    width: 100%;
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
    box-shadow: 0 0 8px rgba(0, 122, 255, 0.4); /* Subtle glowing effect */
}

/* Submit Button */
form button {
    background-color: #007aff; /* iOS Blue */
    color: white;
    padding: 15px;
    border: none;
    border-radius: 12px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button:hover {
    background-color: #005ac1; /* Darker blue on hover */
}

/* Error Message Styling */
.alert-message {
    font-size: 16px;
    color: #ff3b30; /* iOS red for error */
    text-align: center;
    margin-bottom: 20px;
}

/* Responsive Design */
@media (max-width: 768px) {
    form {
        width: 95%;
        padding: 15px;
    }
}
</style>

</head>
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

// Get the bill ID from the form (assuming this is passed as a hidden input)
$bill_id = $_POST['bill_id'] ?? null;

// Check if payment details are submitted
if (isset($_POST['card_number'], $_POST['expiry_date'], $_POST['cvv'])) {
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];

    // Validate card number (must be 16 digits)
    if (strlen($card_number) !== 16 || !is_numeric($card_number)) {
        echo "<script>alert('Incorrect card number. Please enter a valid 16-digit card number.'); window.location.href = 'process_payment.php';</script>";
        exit; // Stop the script execution if card number is invalid
    }

    // Basic validation for expiry date and CVV (you can expand this as needed)
    if (empty($expiry_date) || empty($cvv)) {
        echo "<script>alert('Expiry date or CVV cannot be empty.');</script>";
        exit;
    }

    // Process the payment and update the bill's status
    $query = "UPDATE bills SET payment_status = 'Paid' WHERE bill_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $bill_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Payment successful..'); window.location.href = 'view_bill.php';</script>";
    } else {
        echo "<script>alert('Payment failed. Please try again.');</script>";
    }

    $stmt->close();
} else {
}

$mysqli->close();
?>


<form method="POST" action="process_payment.php">
    <h2>Enter Payment Details</h2>
    <label for="card_number">Card Number:</label>
    <input type="text" id="card_number" name="card_number" required maxlength="16" />

    <label for="expiry_date">Expiry Date:</label>
    <input type="text" id="expiry_date" name="expiry_date" required placeholder="MM/YY" />

    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" required maxlength="3" />

    <input type="hidden" name="bill_id" value="1" /> 

    <button type="submit">Pay Now</button>
</form>

