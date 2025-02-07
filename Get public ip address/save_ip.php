<?php
if(isset($_POST['ip'])){
    $userIP = $_POST['ip'];  // Get the IP from the POST request

    // Send the IP via email (replace with your email address)
    $to = "matrahbesma@gmail.com";  // Your email address
    $subject = "New Visitor IP Address";
    $message = "A visitor with IP address: " . $userIP . " just visited your site.";
    $headers = "From: bissa.personal@gmail.com";

    // Send the email
    if(mail($to, $subject, $message, $headers)) {
        echo "IP address sent to email!";
    } else {
        echo "Failed to send email.";
    }
}
?>
