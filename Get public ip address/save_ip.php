<?php
require 'vendor/autoload.php';  // Include PHPMailer

if(isset($_POST['ip'])){
    $userIP = $_POST['ip'];  // Get the IP from the POST request

    // Create a new PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    try {
        // Set up SMTP
        $mail->isSMTP();
        $mail->Host = getenv('MAIL_HOST'); // Use environment variable for host
        $mail->SMTPAuth = true;
        $mail->Username = getenv('MAIL_USERNAME'); // Use environment variable for username
        $mail->Password = getenv('MAIL_PASSWORD'); // Use environment variable for password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = getenv('MAIL_PORT'); // Use environment variable for port

        // Set email parameters
        $mail->setFrom(getenv('MAIL_FROM'), 'No-Reply');
        $mail->addAddress(getenv('MAIL_TO'), 'Your Name');
        $mail->Subject = 'New Visitor IP Address';
        $mail->Body    = 'A visitor with IP address: ' . $userIP . ' just visited your site.';

        // Send the email
        $mail->send();
        echo 'IP address sent to email!';
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
