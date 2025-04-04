<?php
header('Content-Type: text/html; charset=UTF-8');

// Allow only POST requests
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    http_response_code(405); // Method Not Allowed
    echo "Error: Only POST requests are allowed.";
    exit;
}

// Check if email is provided
if (!isset($_POST["email"])) {
    http_response_code(400); // Bad Request
    echo "Error: Email is required.";
    exit;
}

// Sanitize and validate email
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Error: Please enter a valid email address.";
    exit;
}

// Configure email (replace placeholders)
$to = "Rameshori.Prajapati@nlico.onmicrosoft.com"; // Your real email
$subject = "New Subscription from Coming Soon Page";
$message = "New subscriber:\n\nEmail: " . $email;
$headers = "From: admin@nlico.onmicrosoft.com\r\n" .
           "Reply-To: $email\r\n" .
           "X-Mailer: PHP/" . phpversion();

// Send email
if (mail($to, $subject, $message, $headers)) {
    echo "Thank you! We’ll notify you when we launch.";
} else {
    http_response_code(500); // Server Error
    echo "Error: Failed to send email. Please try again later.";
}
?>
