<html>
<title>Care Compass Hospital
</title>
<link rel="icon" type="image/png" sizes="32x32" href="../Care Compass Hospital/Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Care Compass Hospital/Assets/favicon16.png">
<head>
<style>
    /* Bill Details Section */
.bill-details-container {
    width: 80%;
    max-width: 900px;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Heading for Bill Details */
.bill-details-container h2 {
    text-align: center;
    color: #007aff; /* Blue */
    font-size: 32px;
    margin-bottom: 20px;
}

/* Bill Summary Section */
.bill-summary {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
    border-bottom: 2px solid #ccc;
    padding-bottom: 20px;
}

.bill-summary div {
    font-size: 18px;
}

.bill-summary .label {
    font-weight: bold;
}

.bill-summary .value {
    text-align: right;
}

/* Bill Items Table */
.bill-items-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
}

.bill-items-table th,
.bill-items-table td {
    padding: 12px;
    border: 1px solid #007aff; /* Blue */
    text-align: center;
}

.bill-items-table th {
    background-color: #007aff; /* Blue */
    color: white;
    font-size: 18px;
}

.bill-items-table td {
    background-color: #e6f0ff; /* Light Blue */
    font-size: 16px;
}

/* Total Amount Section */
.total-amount {
    font-size: 24px;
    font-weight: bold;
    text-align: right;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 2px solid #ccc;
}

.total-amount span {
    color: #007aff; /* Blue */
}

/* Payment Options Section */
.payment-options {
    text-align: center;
    margin-top: 40px;
}

.payment-options button {
    padding: 15px 30px;
    background-color: #007aff; /* Blue */
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.payment-options button:hover {
    background-color: #005bb5; /* Darker Blue */
}

/* Go Back Button Styling */
.go-back-btn {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 24px;
    background-color: #e6f0ff; /* Light Blue */
    color: #007aff; /* Blue */
    border: 1px solid #007aff;
    border-radius: 5px;
    font-size: 18px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.go-back-btn:hover {
    background-color: #d0e6ff; /* Lighter Light Blue */
}

/* Responsive Design for Mobile */
@media (max-width: 768px) {
    .bill-details-container {
        width: 90%;
    }

    .bill-summary {
        flex-direction: column;
        align-items: flex-start;
    }

    .bill-summary div {
        margin-bottom: 10px;
    }

    .bill-items-table th,
    .bill-items-table td {
        font-size: 14px;
    }

    .total-amount {
        font-size: 20px;
    }

    .payment-options button {
        width: 100%;
        font-size: 16px;
    }

    .go-back-btn {
        width: 100%;
        font-size: 16px;
    }
}

</style>
</head>
<body>
<div class="bill-details-container">
    <h2>Bill Details</h2>

    <!-- Bill Summary Section -->
    <div class="bill-summary">
        <div class="label">Patient Name:</div>
        <div class="value">John Doe</div>
    </div>
    <div class="bill-summary">
        <div class="label">Bill Number:</div>
        <div class="value">#123456</div>
    </div>
    <div class="bill-summary">
        <div class="label">Date:</div>
        <div class="value">2025-01-07</div>
    </div>

    <!-- Bill Items Table -->
    <table class="bill-items-table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Consultation</td>
                <td>1</td>
                <td>5000 LKR</td>
            </tr>
            <tr>
                <td>Lab Test</td>
                <td>2</td>
                <td>3000 LKR</td>
            </tr>
        </tbody>
    </table>

    <!-- Total Amount Section -->
    <div class="total-amount">
        Total Amount: <span>8000 LKR</span>
    </div>

    <!-- Payment Options -->
    <div class="payment-options">
    <a href="process_payment.php" class="pay-now-button">
        <button>Pay Now</button>
    </div>

    <!-- Go Back Button -->
    <a href="view_bill.php" class="go-back-btn">Go Back</a>
</div>

</body>
