<head>
    <!-- Add Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
        /* General Body Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            color: #333;
        }

        /* Navbar Styling */
        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #007bff; /* Main background color for navbar */
            padding: 15px 0; /* Added padding for better spacing */
            position: sticky; /* Navbar sticks to the top when scrolling */
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
        }

        nav a {
            color: white;
            padding: 12px 18px; /* Increased padding for better clickability */
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        nav a:hover {
            background-color: #005bb5; /* Hover effect color */
            transform: scale(1.1); /* Slight zoom-in effect on hover */
        }

        /* Active Link Styling */
        nav a.active {
            background-color: #007bff; /* Highlight the active page */
            color: #fff;
        }

        /* Navbar Dropdown Styling */
        nav .dropdown {
            position: relative;
            display: inline-block;
        }

        nav .dropdown-content {
            display: none;
            position: absolute;
            background-color: #ffffff;
            min-width: 180px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            margin-top: 10px; /* Added space to prevent overlap with navbar */
            padding: 10px 0; /* Padding for dropdown items */
        }

        nav .dropdown:hover .dropdown-content {
            display: block;
        }

        nav .dropdown-content a {
            color: #333;
            padding: 10px 20px; /* Better padding for each item */
            text-decoration: none;
            display: block;
            border-radius: 5px;
        }

        nav .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        /* Responsive Navbar (For Smaller Screens) */
        @media screen and (max-width: 768px) {
            nav {
                flex-direction: column;
                padding: 10px 0; /* Adjust padding for smaller screens */
            }

            nav a {
                margin: 5px 0;
            }
        }

        /* Logo Styling */
        .logo-n {
            max-height: 50px; /* Adjust this based on your logo size */
        }

        .btn-floating-back {
    position: fixed;
    top: 75px; /* Adjust the distance from the top */
    left: 20px; /* Adjust the distance from the left */
    background-color: #007BFF; /* Blue color */
    color: white;
    border: none;
    border-radius: 25px; /* Rounded corners for button */
    padding: 10px 15px; /* Padding for text and icon */
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    z-index: 1000; /* Ensure it stays on top of other elements */
    transition: background-color 0.3s ease, transform 0.2s ease;
    border: #fff solid;
}

.btn-floating-back:hover {
    background-color: #0056b3; /* Darker blue on hover */
    transform: scale(1.1); /* Slight zoom on hover */
}

.btn-floating-back i {
    font-size: 18px; /* Icon size */
    margin-right: 8px; /* Space between icon and text */
}

.btn-text {
    font-size: 16px; /* Adjust text size */
    font-weight: 500; /* Slightly bold for visibility */
}

    </style>
</head>

<nav style="padding-top: 5px; padding-bottom: 5px;">
    <!-- Logo as Home Button -->
    <a href="index.php" style="padding-top: 0px;padding-bottom: 0px;">
        <img src="../Care Compass Hospital/Assets/navbar_logo.png" alt="Hospital Logo" class="logo-n">
    </a>

    <!-- Dropdown for Services -->
    <div class="dropdown">
        <a href="services.php"><i class="fas fa-concierge-bell"></i> Services</a>
        <div class="dropdown-content">
            <a href="view_bill.php"><i class="fas fa-credit-card"></i> Payments</a>
            <a href="appointment.php"><i class="fas fa-calendar-plus"></i> Book Appointment</a>
            <a href="test_details.php"><i class="fas fa-flask"></i> Medical Test</a>
            <a href="services.php"><i class="fas fa-flask"></i> Services</a>
        </div>
    </div>

    <!-- Dropdown for About Us -->
    <div class="dropdown">
        <a href="about.php"><i class="fas fa-info-circle"></i> About Us</a>
        <div class="dropdown-content">
            <a href="contact.php"><i class="fas fa-phone"></i> Contact Us</a>
            <a href="location.php"><i class="fas fa-map-marker-alt"></i> Location</a>
            <a href="about.php"><i class="fas fa-info-circle"></i> About Us</a>
            <a href="feedback.php"><i class="fas fa-comment-dots"></i> Feedbacks</a>
        </div>
    </div>

    <a href="doctor.php"><i class="fas fa-user-md"></i> Doctors</a>
    <a href="login.php" class="login-button"><i class="fas fa-sign-out-alt"></i> Log In</a>
</nav>

<button onclick="goBack()" class="btn-floating-back">
    <i class="fas fa-arrow-left"></i> <span class="btn-text">Back</span>
</button>

<script>
    function goBack() {
        window.history.back(); // Go to the previous page in browser history
    }
</script>
