<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Location</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../Care Compass Hospital/Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Care Compass Hospital/Assets/favicon16.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
            color: #333;
        }

        .location-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .location-container h2 {
            color: #007aff;
            margin-bottom: 20px;
        }

        .map-container iframe {
            width: 100%;
            height: 400px;
            border: 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .get-directions {
            margin-top: 20px;
        }

        .get-directions a {
            text-decoration: none;
            color: #ffffff;
            background-color: #007aff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .get-directions a:hover {
            background-color: #005bb5;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
    <div class="location-container">
        <h2>Our Location</h2>
        <p>
            Visit us at <strong>Care Compass Hospital</strong>, located in Colombo, Sri Lanka.
        </p>
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.610069784658!2d79.84669427486116!3d6.937118993062871!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2590052375c2f%3A0x311a4cc26adfe836!2sCare%20Compass%20Hospital!5e0!3m2!1sen!2slk!4v1736282232425!5m2!1sen!2slk" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="get-directions">
            <a href="https://maps.app.goo.gl/rLg52Wk8tXcUTmGt6" target="_blank">
                Get Directions
            </a>
        </div>
    </div>
</body>
</html>
