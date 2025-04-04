<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "admin@nlico.onmicrosoft.com"; // Replace with your email
        $subject = "New Subscription from Coming Soon Page";
        $message = "A new user subscribed to your coming soon page:\n\nEmail: " . $email;
        $headers = "From: no-reply@nlico.onmicrosoft.com" . "\r\n" .
                   "Reply-To: " . $email . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo "Thank you! We'll notify you when we launch.";
        } else {
            echo "Oops! Something went wrong. Please try again.";
        }
    } else {
        echo "Please enter a valid email address.";
    }
} else {
    echo "Invalid request.";
}
?>
