<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ('PHPMailer/src/PHPMailer.php');
require ('PHPMailer/src/Exception.php');
require ('PHPMailer/src/SMTP.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $types = $_POST['types'];
    $pwd = $_POST['pwd'];
    $senior = $_POST['senior'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $departureDate = $_POST['departure-date'];
    $returnDate = $_POST['return-date'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $specialRequest = $_POST['special-requests'];
    
    // Initialize PHPMailer object
    $mail = new PHPMailer(true); // Enable exceptions

    $mail->SMTPDebug = 1;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    
    // Set SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jsciataaaa@gmail.com';
    $mail->Password = 'wqftfdqyeinslqth';   
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->isHTML(true);
    
    // Set email content
    $mail->setFrom($email, $name);
    $mail->addAddress('jsciataaaa@gmail.com');
    $mail->Subject = 'For Qoutation';
    $mail->Body = '<div style="background-image: url(\'images/elisse: .jpg;\'); background-repeat: no-repeat; border: 1px solid black; padding: 10px;">'
        . '     New Booking Request <br><br>'
        . '<table>'
        . '<tr><td><b>Full name:</b></td><td>' . $name . '</td></tr>'
        . '<tr><td><b>Email:</b></td><td>' . $email . '</td></tr>'
        . '<tr><td><b>Phone number:</b></td><td>' . $phone . '</td></tr>'
        . '<tr><td><b>Types of Tour:</b></td><td>' . $types . '</td></tr>'
        . '<tr><td><b>Number of PWD:</b></td><td>' . $pwd . '</td></tr>'
        . '<tr><td><b>Number of Senior:</b></td><td>' . $senior . '</td></tr>'
        . '<tr><td><b>Departure from:</b></td><td>'. $from . '</td></tr>'
        . '<tr><td><b>Arrival at:</b></td><td>' . $to . '</td></tr>'
        . '<tr><td><b>Departure date:</b></td><td>' . $departureDate . '</td></tr>'
        . '<tr><td><b>Return date:</b></td><td>' . $returnDate . '</td></tr>'
        . '<tr><td><b>Number of adults:</b></td><td>' . $adults . '</td></tr>'
        . '<tr><td><b>Number of children:</b></td><td>' . $children . '</td></tr>'
        . '<tr><td><b>Additional Requests:</b></td><td>' . $specialRequest. '</td></tr>'
        . '</table><br>'
        . '<b>You can send the quotation through their gmail</b>'
        . '</div>';
    
    
    
    // Send email and check for errors
    if($mail->send()) {
        header("Location: thankyou.html");
    } else {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

?>






