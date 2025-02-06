<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Log the contact details (or send email)
    $log = "Name: $name\nEmail: $email\nMessage: $message\n\n";
    file_put_contents("contact_log.txt", $log, FILE_APPEND);

    echo "Thank you, $name! Your message has been received.";
}
?>
