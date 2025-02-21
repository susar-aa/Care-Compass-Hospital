<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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

        .contact-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-container h2 {
            text-align: center;
            color: #007aff;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        form input, form textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            font-size: 14px;
        }

        form button {
            padding: 10px;
            background-color: #007aff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        form button:hover {
            background-color: #005bb5;
        }

        .success, .error {
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

    <div class="contact-container">
        <h2>Contact Us</h2>
        <form action="contact_submit.php" method="POST">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="message">Your Message:</label>
            <textarea id="message" name="message" placeholder="Enter your message" rows="5" required></textarea>

            <button type="submit">Submit</button>
        </form>
        <h3 style="text-align: center;">Our Contact Details</h3>
            <p style="text-align: center;">Email: info@carecompasshospital.com</p>
            <p style="text-align: center;">Phone: +94 123 456 789</p>
            <p style="text-align: center;">Address: 123 Main Street, Colombo, Sri Lanka</p>
    </div>

    <?php include 'footer.php'; ?>

</body>
</html>
