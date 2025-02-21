<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Care Compass Hospital</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../Care Compass Hospital/Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Care Compass Hospital/Assets/favicon16.png">
    <style>
        /* General Styling */
        body {
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #f0f1f6;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Header Section */
        header {
            background-color: #007aff;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 24px;
            font-weight: 600;
            border-radius: 0 0 20px 20px;
        }

        /* Main Container */
        .container {
            width: 90%;
            max-width: 700px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Section Title */
        .section-title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #007aff;
            text-align: center;
        }

        /* About Content */
        .about-content {
            font-size: 16px;
            line-height: 1.6;
            text-align: justify;
            color: #555;
        }

        /* Mission Section */
        .mission-section {
            margin-top: 30px;
        }

        /* Footer */
        footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    

    <header>
        About Us
    </header>

    <div class="container">
        <h2 class="section-title">Welcome to Care Compass Hospital</h2>
        <p class="about-content">
            At <strong>Care Compass Hospital</strong>, we are dedicated to providing exceptional healthcare services to our patients. 
            With a focus on innovation and compassion, our state-of-the-art facilities and expert medical professionals ensure the 
            highest standard of care for every individual.
        </p>

        <div class="mission-section">
            <h3 class="section-title">Our Mission</h3>
            <p class="about-content">
                Our mission is to enhance the well-being of our community through accessible, reliable, and patient-centered care. 
                We strive to foster an environment where trust, excellence, and integrity drive every decision we make.
            </p>
        </div>

        <div class="mission-section">
            <h3 class="section-title">Why Choose Us?</h3>
            <p class="about-content">
                - Experienced medical staff with a patient-first approach.<br>
                - Advanced medical technologies and infrastructure.<br>
                - 24/7 emergency services.<br>
                - A legacy of trust, care, and excellence in healthcare.<br>
            </p>
        </div>
    </div>

    <footer>
        &copy; <?= date("Y") ?> Care Compass Hospital. All Rights Reserved.
    </footer>
    
</body>
</html>
