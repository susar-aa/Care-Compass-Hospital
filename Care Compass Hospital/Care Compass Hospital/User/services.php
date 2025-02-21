<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Services | Care Compass Hospitals</title>
  <link rel="stylesheet" href="services.css">
  <style>
    /* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #f4f7fc;
  color: #333;
  line-height: 1.6;
}

/* Header Section */
.header {
  text-align: center;
  background-color: #004aad;
  color: white;
  padding: 20px 10px;
}

.header h1 {
  font-size: 2.5rem;
  margin-bottom: 10px;
}

.header p {
  font-size: 1.2rem;
  margin-top: 0;
}

/* Services Section */
.services-section {
  max-width: 1000px;
  margin: 30px auto;
  padding: 0 20px;
}

.category {
  background: white;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.category h2 {
  color: #004aad;
  font-size: 1.8rem;
  margin-bottom: 15px;
  border-bottom: 2px solid #ddd;
  padding-bottom: 5px;
}

.category ul {
  list-style: disc inside;
  margin-left: 20px;
}

.category ul li {
  margin: 8px 0;
  font-size: 1rem;
  color: #555;
}

.category:hover {
  background-color: #f9fbff;
  border-color: #004aad;
  transition: 0.3s ease-in-out;
}

/* Footer */
.footer {
  text-align: center;
  background-color: #004aad;
  color: white;
  padding: 10px 0;
  margin-top: 20px;
}

.footer p {
  font-size: 0.9rem;
}

  </style>
</head>
<body>
<?php include 'navbar.php'; ?>
  <header class="header">
    <h1>Our Services</h1>
    <p>We offer a wide range of medical services to meet your health needs.</p>
  </header>

  <section class="services-section">
    <div class="category">
      <h2>Medical Services</h2>
      <ul>
        <li>General Medicine</li>
        <li>Cardiology</li>
        <li>Pediatrics</li>
        <li>Dermatology</li>
        <li>Oncology</li>
        <li>Gastroenterology</li>
      </ul>
    </div>

    <div class="category">
      <h2>Surgical Services</h2>
      <ul>
        <li>Orthopedic Surgery</li>
        <li>Neurosurgery</li>
        <li>Cardiac Surgery</li>
        <li>ENT Surgery</li>
        <li>Plastic and Reconstructive Surgery</li>
      </ul>
    </div>

    <div class="category">
      <h2>Diagnostic Services</h2>
      <ul>
        <li>Radiology (X-rays, MRIs, CT Scans)</li>
        <li>Pathology</li>
        <li>Ultrasound Scanning</li>
        <li>Laboratory Testing</li>
        <li>Cardiac Stress Testing</li>
      </ul>
    </div>

    <div class="category">
      <h2>Emergency and Specialized Care</h2>
      <ul>
        <li>24/7 Emergency Services</li>
        <li>ICU and NICU Care</li>
        <li>Ambulance Services</li>
        <li>Maternity and Childbirth Services</li>
        <li>Psychiatric and Mental Health Support</li>
      </ul>
    </div>
  </section>

  <?php include 'footer.php'; ?>
</body>
</html>
