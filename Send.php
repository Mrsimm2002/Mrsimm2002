<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST["phone"]), ENT_QUOTES, 'UTF-8');
    $comments = htmlspecialchars(trim($_POST["message"]), ENT_QUOTES, 'UTF-8');
    $contact_reason = htmlspecialchars($_POST["contact_reason"], ENT_QUOTES, 'UTF-8');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    if (empty($name) || empty($email) || empty($comments) || empty($contact_reason)) {
        die("All required fields must be filled out.");
    }

    // Recipient
    $to = "mrsimm2002@gmail.com";

    // Subject
    $subject = "New Contact Form Submission";

    // Message
    $message = "You have received a new message from your website contact form.\n\n";
    $message .= "Name: $name\n";
    $message .= "Reason for Contact: $contact_reason\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Comments:\n$comments\n";

    // Headers
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    echo "Invalid request.";
}
?>
