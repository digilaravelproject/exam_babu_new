<?php
// about-us.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Exambabu</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            color: #3f51b5;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 1.8rem;
            color: #303f9f;
            margin-top: 30px;
        }

        p {
            font-size: 1rem;
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
        }

        ul {
            margin: 20px 0;
            padding-left: 20px;
        }

        ul li {
            font-size: 1rem;
            color: #555;
            margin-bottom: 10px;
        }

        .highlight {
            color: #3f51b5;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #777;
        }

        .home-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #ffffff;
            background-color: #3f51b5;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #303f9f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>About Us</h1>
        <p>Welcome to <span class="highlight">Exambabu</span> – your ultimate online destination for comprehensive MCQ practice and assessments.</p>

        <p>At Exambabu, we understand the importance of effective preparation. That's why we've created a platform that provides you with a vast array of MCQs across various subjects and disciplines. Our goal is to make your learning journey engaging, efficient, and successful.</p>

        <h2>Our Mission</h2>
        <p>We are committed to empowering students and professionals by offering an extensive range of multiple-choice questions designed to boost their knowledge and test-taking skills. Whether you're preparing for competitive exams, entrance tests, or seeking to enhance your expertise in specific areas, Exambabu is here to support you every step of the way.</p>

        <h2>What We Offer</h2>
        <ul>
            <li><strong>Extensive MCQ Library:</strong> Our platform hosts a diverse collection of MCQs, meticulously crafted to cover different topics and difficulty levels.</li>
            <li><strong>Practice Mode:</strong> Flex your brain muscles with our practice mode, allowing you to refine your understanding and identify areas for improvement.</li>
            <li><strong>Online MCQ Exams:</strong> Simulate real exam conditions with our timed online MCQ exams, designed to help you build confidence and improve your performance under pressure.</li>
            <li><strong>Progress Tracking:</strong> Stay informed about your progress with detailed reports and analytics, enabling you to track your performance and make data-driven study decisions.</li>
        </ul>

        <h2>Why Choose Exambabu?</h2>
        <ul>
            <li><strong>User-Friendly Interface:</strong> Our intuitive platform ensures a seamless and enjoyable experience for all users.</li>
            <li><strong>Expert-Developed Content:</strong> Each MCQ is created and reviewed by subject matter experts to ensure accuracy and relevance.</li>
            <li><strong>24/7 Access:</strong> Study anytime, anywhere with our round-the-clock access to all features and resources.</li>
        </ul>

        <p>Join Exambabu today and take the first step towards achieving your academic and professional goals.</p>

        <p>Feel free to reach out to us with any questions or feedback. We're <span class="highlight">here to help!</span></p>
        <a href="index.php" class="home-button">Home Page</a>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y"); ?> Exambabu. All rights reserved.
    </div>
</body>
</html>
