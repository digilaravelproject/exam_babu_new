<?php
// contact-us.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "rajesh1692365@gmail.com";
    $subject = "New Contact Form Submission from Exambabu";
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";
    
    $body = "Name: $name\n" .
            "Email: $email\n" .
            "Message:\n$message\n";
    
    if (mail($to, $subject, $body, $headers)) {
        $successMessage = "Your message has been sent successfully!";
    } else {
        $errorMessage = "There was an error sending your message. Please try again later.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Exambabu</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            color: #3f51b5;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-size: 1rem;
            color: #555;
            display: block;
            margin-top: 10px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background-color: #3f51b5;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }

        button:hover {
            background-color: #303f9f;
        }

        .message {
            text-align: center;
            margin-top: 15px;
            font-size: 1rem;
            color: green;
        }

        .whatsapp {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
            color: #555;
        }

        .home-button {
            display: block;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #3f51b5;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        .home-button:hover {
            background-color: #303f9f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <?php if (!empty($successMessage)) echo "<p class='message'>$successMessage</p>"; ?>
        <?php if (!empty($errorMessage)) echo "<p class='message' style='color:red;'>$errorMessage</p>"; ?>
        
        <form action="" method="POST">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            
            <button type="submit">Send Message</button>
        </form>
        
        <p class="whatsapp">For quick support, reach out on WhatsApp: <strong><a href="https://wa.me/8169695922" target="_blank">8169695922</a></strong></p>
        <a href="index.php" class="home-button">Home Page</a>
    </div>
</body>
</html>
