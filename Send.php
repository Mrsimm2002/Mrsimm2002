<?php
if(isset($_POST['submit']))
{
    $to = "mrsimm2002@gmail.com"; // Your email address
    $from = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];


    $headers = "From: " . $from . "\r\n";
    // Send email with headers
    $subject = "Message from " . $email;
    $body = "<strong>Name:</strong> " . $name . "<br>" .
            "<strong>Phone:</strong> " . $phone . "<br>" .
            "<strong>Message:</strong> " . $message;

    mail($to, $subject, $body, $headers);
}
?>
