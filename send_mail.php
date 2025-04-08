<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "Tanushree.Agrawal@nlico.onmicrosoft.com"; // Replace with your host email address
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = nl2br(htmlspecialchars($_POST['message']));

    $subject = "Contact Form Message from $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    $body = "
    <h3>You received a message from your website:</h3>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Message:</strong><br>{$message}</p>
    ";

    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Message failed to send.'); window.history.back();</script>";
    }
}
?>
