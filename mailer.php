<?php

include_once("../hotel/common/connection.php");
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$id="65def5e5a8af5";

$query = "SELECT * FROM bookingmaster WHERE usrId ='$id' ";
$result = mysqli_query($connection, $query);
$r = mysqli_fetch_array($result);




// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     // SMTP server
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'popti1617@gmail.com';                     // SMTP username
    $mail->Password   = 'hivc icmd pvhw glvl';                         // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
//hivc icmd pvhw glvl
    //Recipients
    $mail->setFrom('popti1617@gmail.com', 'Sogo Hotel');
    $mail->addAddress($r['email'], $r['name']); 
    // Add a recipient
    //$mail->addAddress('jenilpatel653@gmail.com','Jenil Patel');
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Booking Confirmation';
    $mail->Body    = '<html>
    <head>
        <title>Booking</title>
        <style>
            .mailer-main{
                border:1px solid green;
                width:80%;
                margin: auto;
                padding: 20px;
                height:450px;
            }
            .hr{
                width: 100%;
            }
          
          
          
        </style>
    </head>
    <body>
        <div class="mailer-main">
            <h1>Sogo Hotel</h1>
            <hr class="hr">
            <div>
                <h3>Booking Confirmed!</h3>
                <h4>Thank You</h4>
                <p>
                    We are pleased to inform you that your booking request has been received.
                </p>
                <p>
                    Check In    :   '.$r["cid"].'
                </p>
                <p>
                    Check Out   :   '.$r["cod"].'
                </p>
            </div>
        </div>
    </body>
</html>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>