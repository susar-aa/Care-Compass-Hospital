<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities & Services</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../Assets/favicon32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../Assets/favicon16.png">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #f0f8ff, #e0f7fa);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        .carousel-container {
            width: 90%;
            max-width: 1200px;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            background-color: #ffffff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .carousel-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .carousel-header h2 {
            font-size: 24px;
            color: #007bff;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .carousel-track-wrapper {
            overflow: hidden;
        }

        .carousel-track {
            display: flex;
            gap: 20px;
            transition: transform 0.5s ease;
        }

        .carousel-card {
            flex: 0 0 300px;
            height: 220px;
            background: linear-gradient(135deg, #007bff, #00bcd4);
            color: #ffffff;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            text-align: center;
            cursor: pointer;
            transform: scale(1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .carousel-card:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .carousel-card h3 {
            margin: 0;
            font-size: 18px;
            letter-spacing: 1px;
        }

        .carousel-card p {
            margin: 10px 0 0;
            font-size: 14px;
        }

        .carousel-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 123, 255, 0.8);
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 10;
            transition: background-color 0.3s ease;
        }

        .carousel-arrow:hover {
            background-color: #0056b3;
        }

        .carousel-arrow-left {
            left: 10px;
        }

        .carousel-arrow-right {
            right: 10px;
        }

        /* Fix for the right arrow */
        .carousel-arrow-right {
            z-index: 10; /* Ensure it's above all other elements */
        }
    </style>
</head>
<body>
    <div class="carousel-container">
        <div class="carousel-header">
            <h2>Our Facilities & Services</h2>
        </div>
        <button class="carousel-arrow carousel-arrow-left" onclick="scrollCarousel('left')">&lt;</button>
        <div class="carousel-track-wrapper">
            <div class="carousel-track">
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
            </div>
        </div>
        <button class="carousel-arrow carousel-arrow-right" onclick="scrollCarousel('right')">&gt;</button>
    </div>

    <script>
        const track = document.querySelector('.carousel-track');
        const cards = document.querySelectorAll('.carousel-card');
        const cardWidth = cards[0].offsetWidth + 20; // Card width + gap

        let currentPosition = 0;

        function scrollCarousel(direction) {
            if (direction === 'left') {
                currentPosition += cardWidth;
                if (currentPosition > 0) {
                    currentPosition = -(cardWidth * (cards.length - 4)); // 4 cards visible at a time
                }
            } else if (direction === 'right') {
                currentPosition -= cardWidth;
                if (Math.abs(currentPosition) >= cardWidth * cards.length) {
                    currentPosition = 0;
                }
            }
            track.style.transform = `translateX(${currentPosition}px)`;
        }
    </script>
</body>
</html>
