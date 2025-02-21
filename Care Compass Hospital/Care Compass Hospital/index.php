<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Compass Hospitals</title>
    <link rel="stylesheet" href="../Care Compass Hospital/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="../Care Compass Hospital/Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Care Compass Hospital/Assets/favicon16.png">
<style>
    #branches {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

    /* Initial state of the logos */
    .logo {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

     /* Initial state for the section and elements */
     #about-us {
        opacity: 0;
        transform: translateY(50px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

    .text-section, .image-section {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

    /* When the section becomes visible, apply animation */
    #about-us.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* When the text and image sections are visible, apply animation */
    .text-section.visible, .image-section.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Ensure navbar stays unaffected */
    .navbar, #home-logo {
        position: relative;
        z-index: 10;
    }

    #quality-data {
    padding: 50px 20px;
    background-color:white;
    text-align: center;
}

#quality-data h2 {
    font-size: 28px;
    color: #007BFF;
    margin-bottom: 40px;
    animation: fadeIn 1s ease-out;
}

.quality-wrapper {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    max-width: 950px;
    margin: 0 auto;
    animation: fadeInUp 1s ease-out;
}

.quality-item {
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: all 0.3s ease-in-out;
    opacity: 0;
    transform: translateY(20px);
    animation: slideInUp 0.8s forwards;
}

.quality-item:nth-child(1) { animation-delay: 0.1s; }
.quality-item:nth-child(2) { animation-delay: 0.2s; }
.quality-item:nth-child(3) { animation-delay: 0.3s; }
.quality-item:nth-child(4) { animation-delay: 0.4s; }
.quality-item:nth-child(5) { animation-delay: 0.5s; }
.quality-item:nth-child(6) { animation-delay: 0.6s; }
.quality-item:nth-child(7) { animation-delay: 0.7s; }

.quality-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.quality-percentage {
    font-size: 32px;
    font-weight: bold;
    color: #007BFF;
    margin-bottom: 10px;
}

.quality-item p {
    font-size: 14px;
    color: #555;
}

.why-choose-us {
    margin-top: 50px;
    background-color: #fff;
    padding: 25px;
    border-radius: 8px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    max-width: 900px;
    margin: 50px auto;
    animation: fadeInUp 1s ease-out;
}

.why-choose-us h3 {
    color: #007BFF;
    font-size: 22px;
    margin-bottom: 15px;
}

.why-choose-us p {
    font-size: 14px;
    line-height: 1.6;
    color: #333;
    font-weight: 500;
}

@keyframes fadeIn {
    0% { opacity: 0; }
    100% { opacity: 1; }
}

@keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}

@keyframes slideInUp {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}

.custom {
  position: relative;
  top: 300px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  outline: none;
  user-select: none;
  color: #ffffff;
  border-top-width: 1px;
  border-right-width: 1px;
  border-bottom-width: 1px;
  border-left-width: 1px;
  border-top-style: solid;
  border-right-style: solid;
  border-bottom-style: solid;
  border-left-style: solid;
  border-top-color: #000000;
  border-right-color: #000000;
  border-bottom-color: #000000;
  border-left-color: #000000;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
  background-color: #3b82f6;
  animation: pulse 1.5s ease-in-out infinite;
  text-decoration: none;
}

.custom:hover {
  transition: all 0.3s ease;
  background-color: #fff;
  color: #000000;
  box-shadow: 0 0 30px rgba(59, 130, 246, 0.5);
}

@keyframes pulse {
  0% { transform: scale(1); }
  50% { transform: scale(1.05); }
  100% { transform: scale(1); }
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

// Query to fetch feedbacks
$query = "SELECT * FROM feedback ORDER BY submitted_at DESC"; // Assuming there's a timestamp column `submitted_at`
$result = $mysqli->query($query);

// Check if the query was successful
if ($result === false) {
    die("Error executing query: " . $mysqli->error);
}
?>


<body>



<?php include 'navbar.php'; ?>

    <div class="hero-image">

<!-- Floating Feedback Icon with Text -->
<a href="feedback.php" class="feedback-icon" title="Give Feedback">
    <img src="../Care Compass Hospital/Assets/feedback.png" alt="Feedback" />
    <span class="feedback-text">Feedback</span>
</a>

<a href="appointment.php" class="custom">Book Appointment</a>

</div>

    <!-- Facilities Carousel -->
    <div class="carousel-container" style="background-color: white;">
    <div class="carousel-header">
        <h2>Our Facilities</h2>
    </div>
    <button class="carousel-arrow carousel-arrow-left" onclick="scrollCarousel('left', 'facilities')">&lt;</button>
    <div class="carousel-track-wrapper">
        <div class="facilities-track carousel-track">
            <!-- Sample Facilities (30 cards) -->
            <div class="carousel-card">
                <h3>Emergency</h3>
                <p>24/7 emergency services</p>
            </div>
            <div class="carousel-card">
                <h3>Pharmacy</h3>
                <p>On-site pharmacy</p>
            </div>
            <div class="carousel-card">
                <h3>ICU</h3>
                <p>Critical care unit</p>
            </div>
            <div class="carousel-card">
                <h3>OPD</h3>
                <p>Outpatient services</p>
            </div>
            <div class="carousel-card">
                <h3>Radiology</h3>
                <p>Advanced diagnostic imaging</p>
            </div>
            <div class="carousel-card">
                <h3>Lab Tests</h3>
                <p>Accurate laboratory services</p>
            </div>
            <div class="carousel-card">
                <h3>Vaccinations</h3>
                <p>Immunizations for all ages</p>
            </div>
            <div class="carousel-card">
                <h3>Cafeteria</h3>
                <p>Healthy meals and snacks</p>
            </div>
            <div class="carousel-card">
                <h3>Dialysis</h3>
                <p>Renal care services</p>
            </div>
            <div class="carousel-card">
                <h3>Oxygen Therapy</h3>
                <p>Respiratory support</p>
            </div>
            <!-- Add more facilities (20 more) -->
            <div class="carousel-card">
                <h3>Cardiology</h3>
                <p>Heart health services</p>
            </div>
            <div class="carousel-card">
                <h3>Neurology</h3>
                <p>Brain and nervous system care</p>
            </div>
            <div class="carousel-card">
                <h3>Pediatrics</h3>
                <p>Care for children</p>
            </div>
            <div class="carousel-card">
                <h3>Orthopedics</h3>
                <p>Bone and joint care</p>
            </div>
            <div class="carousel-card">
                <h3>Gastroenterology</h3>
                <p>Digestive health services</p>
            </div>
            <div class="carousel-card">
                <h3>Urology</h3>
                <p>Urinary tract care</p>
            </div>
            <div class="carousel-card">
                <h3>Oncology</h3>
                <p>Cancer treatment</p>
            </div>
            <div class="carousel-card">
                <h3>Endoscopy</h3>
                <p>Internal examinations</p>
            </div>
            <div class="carousel-card">
                <h3>Skin Care</h3>
                <p>Dermatology services</p>
            </div>
            <div class="carousel-card">
                <h3>ENT</h3>
                <p>Ear, Nose & Throat care</p>
            </div>
            <div class="carousel-card">
                <h3>Plastic Surgery</h3>
                <p>Aesthetic and reconstructive surgery</p>
            </div>
            <div class="carousel-card">
                <h3>Physiotherapy</h3>
                <p>Rehabilitation services</p>
            </div>
            <div class="carousel-card">
                <h3>Speech Therapy</h3>
                <p>Therapy for communication disorders</p>
            </div>
            <div class="carousel-card">
                <h3>Dental Care</h3>
                <p>Comprehensive dental services</p>
            </div>
            <div class="carousel-card">
                <h3>Blood Bank</h3>
                <p>Blood donations and storage</p>
            </div>
            <div class="carousel-card">
                <h3>Ultrasound</h3>
                <p>Non-invasive imaging</p>
            </div>
            <div class="carousel-card">
                <h3>Ambulance</h3>
                <p>Emergency transportation</p>
            </div>
            <div class="carousel-card">
                <h3>Maternal Health</h3>
                <p>Care for expectant mothers</p>
            </div>
        </div>
    </div>
    <button class="carousel-arrow carousel-arrow-right" onclick="scrollCarousel('right', 'facilities')">&gt;</button>
</div>

<section id="quality-data">
    <h2>Quality Data</h2>
    <div class="quality-wrapper">
        <!-- Data Items -->
        <div class="quality-item">
            <div class="quality-percentage">94.82%</div>
            <p>Patient Satisfaction Rate on Services</p>
        </div>

        <div class="quality-item">
            <div class="quality-percentage">97.30%</div>
            <p>Compliance to Correct Patient Identification</p>
        </div>

        <div class="quality-item">
            <div class="quality-percentage">88.33%</div>
            <p>Hand Hygiene Compliance</p>
        </div>

        <div class="quality-item">
            <div class="quality-percentage">0.09%</div>
            <p>Rate of Hospital Acquired Infections</p>
        </div>

        <div class="quality-item">
            <div class="quality-percentage">0.17%</div>
            <p>Adverse Drug Reaction</p>
        </div>

        <div class="quality-item">
            <div class="quality-percentage">0.00%</div>
            <p>Rate of Hospital Acquired Bed Sores</p>
        </div>

    </div>

    <!-- Why Patients Choose Us Section -->
    <div class="why-choose-us">
        <h3>WHY PATIENTS CHOOSE US</h3>
        <p>Asiri Health employs, consults, and partners with the most dedicated, skilled, and experienced healthcare professionals to offer some of the country’s most advanced, evidence-based clinical programs for treating complex diseases through our Centres of Excellence. We have a sound record for offering outstanding outcomes.</p>
        <p>Asiri Health also offers treatment for increasingly common lifestyle-based diseases, preventive healthcare, and the most complete menu of diagnostic tests.</p>
        <p>All Asiri Health Hospitals have international accreditation.</p>
    </div>
</section>






<section id="about-us" style="padding: 50px; background-color: #f9f9f9;">
    <div style="display: flex; align-items: center; gap: 20px; max-width: 1200px; margin: 0 auto;">
        <!-- Text Section -->
        <div class="text-section" style="flex: 1;">
            <h2 style="color: #007BFF; margin-bottom: 15px;">Compassion, Innovation & Excellence</h2>
            <p style="font-size: 16px; line-height: 1.6; color: #333;">
                Since our foundation in 1945, we have built a reputation for regional leadership in medical excellence and innovation, based on a simple philosophy: that improving the health of our community should be driven by passion as well as compassion.
            </p>
            <p style="font-size: 16px; line-height: 1.6; color: #333;">
                We offer a range of spacious modern rooms and are equipped with state-of-the-art critical care units. At Durdans, the best consultants, specialists, and employees are dedicated to providing exceptional clinical outcomes and the utmost customer satisfaction.
            </p>
            <!-- Button to navigate -->
            <a href="about.php" 
               style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 5px; font-size: 16px; font-weight: 600; transition: background-color 0.3s ease;">
                Learn More
            </a>
        </div>

        <!-- Image Section -->
        <div class="image-section" style="flex: 1; text-align: center;">
            <img src="../Care Compass Hospital/Assets/about.png" alt="Hospital Facility" style="max-width: 100%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        </div>
    </div>
</section>

<script>
    // Function to trigger animation when section is in viewport
    function checkVisibility() {
        const aboutUsSection = document.getElementById('about-us');
        const textSection = document.querySelector('.text-section');
        const imageSection = document.querySelector('.image-section');

        // Get position of section
        const sectionPosition = aboutUsSection.getBoundingClientRect();
        
        // If section is in viewport, add visibility class to trigger animations
        if (sectionPosition.top < window.innerHeight && sectionPosition.bottom >= 0) {
            aboutUsSection.classList.add('visible');
            textSection.classList.add('visible');
            imageSection.classList.add('visible');
        }
    }

    // Trigger checkVisibility on scroll and page load
    window.addEventListener('scroll', checkVisibility);
    window.addEventListener('load', checkVisibility);
</script>



<div class="services-container" style="
    padding-top: 10px;
">
    <div class="services-header">
        <h2>Our Services</h2>
    </div>
    <div class="services-grid">
        <!-- Service Cards -->
        <div class="service-card">
            <h3>Laser Eye Surgery</h3>
            <p>Vision correction through lasers</p>
        </div>
        <div class="service-card">
            <h3>Infertility Treatments</h3>
            <p>Assistance with conception</p>
        </div>
        <div class="service-card">
            <h3>Health Screening</h3>
            <p>Comprehensive checkups to prevent diseases</p>
        </div>
        <div class="service-card">
            <h3>Blood Pressure Monitoring</h3>
            <p>Regular tracking for healthy heart function</p>
        </div>
        <div class="service-card">
            <h3>Chronic Pain Management</h3>
            <p>Care for persistent pain relief</p>
        </div>
        <div class="service-card">
            <h3>Postoperative Care</h3>
            <p>Recovery and monitoring after surgery</p>
        </div>
        <div class="service-card">
            <h3>Home Health Care</h3>
            <p>Healthcare services delivered at home</p>
        </div>
        <div class="service-card">
            <h3>Nutrition Therapy</h3>
            <p>Therapeutic approaches to healthy eating</p>
        </div>
        <div class="service-card">
            <h3>Diabetes Management</h3>
            <p>Ongoing care for diabetes patients</p>
        </div>
        <div class="service-card">
            <h3>Weight Loss Surgery</h3>
            <p>Medical procedures to aid weight loss</p>
        </div>
    </div>
</div>


    <script>
    const facilitiesTrack = document.querySelector('.facilities-track');
    const servicesTrack = document.querySelector('.services-track');
    const facilityCards = document.querySelectorAll('.carousel-card', '.facilities-track');
    const serviceCards = document.querySelectorAll('.carousel-card', '.services-track');
    
    const cardWidth = facilityCards[0].offsetWidth + 20; // Card width + gap
    let facilitiesPosition = 0;
    let servicesPosition = 0;

    // Create the infinite loop by duplicating cards
    function duplicateCards() {
        const facilitiesTrackWrapper = facilitiesTrack.parentNode;
        const servicesTrackWrapper = servicesTrack.parentNode;
        
        // Duplicate cards for facilities
        for (let i = 0; i < 3; i++) {
            const clone = facilityCards[i].cloneNode(true);
            facilitiesTrack.appendChild(clone);
        }

        // Duplicate cards for services
        for (let i = 0; i < 3; i++) {
            const clone = serviceCards[i].cloneNode(true);
            servicesTrack.appendChild(clone);
        }
    }

    // Manual scrolling for both carousels
    function scrollCarousel(direction, carousel) {
        if (carousel === 'facilities') {
            if (direction === 'left') {
                facilitiesPosition += cardWidth;
                if (facilitiesPosition > 0) {
                    facilitiesPosition = -(cardWidth * (facilityCards.length - 4)); // 4 cards visible at a time
                }
            } else if (direction === 'right') {
                facilitiesPosition -= cardWidth;
                if (Math.abs(facilitiesPosition) >= cardWidth * facilityCards.length) {
                    facilitiesPosition = 0;
                }
            }
            facilitiesTrack.style.transform = `translateX(${facilitiesPosition}px)`;
        }

        if (carousel === 'services') {
            if (direction === 'left') {
                servicesPosition += cardWidth;
                if (servicesPosition > 0) {
                    servicesPosition = -(cardWidth * (serviceCards.length - 4)); // 4 cards visible at a time
                }
            } else if (direction === 'right') {
                servicesPosition -= cardWidth;
                if (Math.abs(servicesPosition) >= cardWidth * serviceCards.length) {
                    servicesPosition = 0;
                }
            }
            servicesTrack.style.transform = `translateX(${servicesPosition}px)`;
        }
    }

    // Automatic rotation for both carousels with different directions
    function autoRotateCarousel() {
        // Facilities carousel rotates to the right
        facilitiesPosition -= cardWidth;
        if (Math.abs(facilitiesPosition) >= cardWidth * (facilityCards.length + 3)) {
            facilitiesPosition = 0; // Loop back to start
        }
        facilitiesTrack.style.transform = `translateX(${facilitiesPosition}px)`;

        // Services carousel rotates to the left
        servicesPosition += cardWidth;
        if (servicesPosition > cardWidth * 3) { // When it reaches the duplicated cards, reset to original
            servicesPosition = 0;
        }
        servicesTrack.style.transform = `translateX(${servicesPosition}px)`;
    }

    // Start auto-rotation with faster speed (every 1.5 seconds)
    setInterval(autoRotateCarousel, 1500); // Rotate every 1.5 seconds

    // Duplicate cards for infinite loop after DOM content is loaded
    window.addEventListener('DOMContentLoaded', duplicateCards);
</script>

<section id="branches" style="padding: 50px; padding-bottom: 100px; background-color: #f9f9f9; text-align: center; opacity: 0; transform: translateY(50px); transition: opacity 1s ease-out, transform 1s ease-out; ">
    <!-- Branch Info -->
    <div style="max-width: 800px; margin: 0 auto;">
        <h2 style="color: #007BFF; margin-bottom: 15px;">Care Compass Network</h2>
        <p style="font-size: 16px; line-height: 1.6; color: #333;">
            Six internationally accredited, state-of-the-art hospitals and laboratories, committed to supporting you live your highest quality life, through the provision of leading-edge, ethical healthcare solutions.
        </p>
    </div>

    <!-- Logos Section -->
    <div style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center; gap: 20px; max-width: 800px; margin: 0 auto;">
        <!-- Logo 1 -->
        <div class="logo" style="opacity: 0; transform: translateY(20px); transition: opacity 1s ease-out, transform 1s ease-out;">
            <img src="../Care Compass Hospital/Assets/kuru_logo.png" alt="Kurunegala Branch Logo" style="width: 150px; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <p style="margin-top: 10px; font-size: 14px; font-weight: 500; color: #555;">Kurunegala Branch</p>
        </div>
        <!-- Logo 2 -->
        <div class="logo" style="opacity: 0; transform: translateY(20px); transition: opacity 1s ease-out, transform 1s ease-out;">
            <img src="../Care Compass Hospital/Assets/cmb_logo.png" alt="Colombo Branch Logo" style="width: 150px; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <p style="margin-top: 10px; font-size: 14px; font-weight: 500; color: #555;">Colombo Branch</p>
        </div>
        <!-- Logo 3 -->
        <div class="logo" style="opacity: 0; transform: translateY(20px); transition: opacity 1s ease-out, transform 1s ease-out;">
            <img src="../Care Compass Hospital/Assets/kandy_logo.png" alt="Kandy Branch Logo" style="width: 150px; height: auto; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <p style="margin-top: 10px; font-size: 14px; font-weight: 500; color: #555;">Kandy Branch</p>
        </div>
    </div>
</section>

<script>
    // Function to check if the section is in the viewport
    function checkVisibility() {
        const branchesSection = document.getElementById('branches');
        const logos = document.querySelectorAll('.logo');

        // Get the position of the section
        const sectionPosition = branchesSection.getBoundingClientRect();
        
        // Check if the section is in the viewport
        if (sectionPosition.top < window.innerHeight && sectionPosition.bottom >= 0) {
            // Animate the section and logos
            branchesSection.style.opacity = 1;
            branchesSection.style.transform = 'translateY(0)';
            
            logos.forEach((logo, index) => {
                setTimeout(() => {
                    logo.style.opacity = 1;
                    logo.style.transform = 'translateY(0)';
                }, index * 300); // Delay for each logo for a staggered effect
            });
        }
    }

    // Listen to the scroll event to trigger animation
    window.addEventListener('scroll', checkVisibility);

    // Check visibility on page load in case the section is already in view
    window.addEventListener('load', checkVisibility);
</script>


<?php include 'footer.php'; ?>

</body>
</html>
