<head>
    <style>
        /* Footer Styling */
        .footer {
            background-color: #0053ad;
            color: white;
            padding: 40px 20px;
            font-family: 'Helvetica Neue', sans-serif;
            display: flex;
            align-items: center;
            justify-content: space-between; /* Align content on both sides */
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-section {
            flex: 1 1 250px;
            min-width: 200px;
        }

        .footer-section h4 {
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .footer-section p {
            font-size: 14px;
            line-height: 1.6;
        }

        .social-icons {
            display: flex;
            gap: 10px;
        }

        .social-icons a img {
            width: 30px;
            height: 30px;
            transition: transform 0.2s ease;
        }

        .social-icons a img:hover {
            transform: scale(1.1);
        }

        /* Footer Logo */
        .footer-logo img {
            width: 120px;  /* Fixed width for logo */
            height: 120px; /* Fixed height for logo */
            object-fit: contain; /* Ensures the logo maintains aspect ratio while fitting within the fixed size */
        }

        /* Footer Bottom */
        .footer-bottom {
            text-align: center;
            padding: 10px 0;
            font-size: 14px;
            margin-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

    </style>
</head>

<div class="footer">
    <!-- Footer Logo -->
    <div class="footer-logo">
        <img src="../Assets/logo.png" alt="Care Compass Hospital Logo" style="padding-right: 20px;">
    </div>

    <div class="footer-container">
        <!-- About Section -->
        <div class="footer-section">
            <h4>About Care Compass Hospital</h4>
            <p>
                Dedicated to providing high-quality healthcare with compassion and expertise. 
                Your health, our priority.
            </p>
        </div>

        <!-- Contact Section -->
        <div class="footer-section">
            <h4>Contact Us</h4>
            <p>Email: info@carecompasshospital.com</p>
            <p>Phone: +94 123 456 789</p>
            <p>Address: 123 Main Street, Colombo, Sri Lanka</p>
        </div>

        <!-- Social Media Section -->
        <div class="footer-section">
            <h4>Follow Us</h4>
            <div class="social-icons">
                <a href="https://facebook.com" target="_blank" aria-label="Facebook">
                    <img src="../Assets/facebook.png" alt="Facebook Icon">
                </a>
                <a href="https://twitter.com" target="_blank" aria-label="Twitter">
                    <img src="../Assets/twitter.png" alt="Twitter Icon">
                </a>
                <a href="https://instagram.com" target="_blank" aria-label="Instagram">
                    <img src="../Assets/instagrame.png" alt="Instagram Icon">
                </a>
                <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn">
                    <img src="../Assets/linkedin.png" alt="LinkedIn Icon">
                </a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; <?= date("Y") ?> Care Compass Hospital. All Rights Reserved.</p>
    </div>
</div>
