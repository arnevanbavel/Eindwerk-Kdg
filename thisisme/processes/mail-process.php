<?php
session_start();

require '../classes/User.php' ;
require '../classes/Database.php' ;
require '../classes/Friend.php' ;
require '../assets/PHPMailer/PHPMailerAutoload.php';

$message = NULL;
$USER    = new User();
$dbClass = new Database();
$friends = new Friend();

if ( $USER->validate($dbClass) )
{
    $userData   =   explode( ',', $_COOKIE['authenticated'] ); //explode sheid een string bij ','
    $username   =   $userData[0];
    $userData   =   $USER->toonInfo($dbClass, $username);
    if (isset($_POST['meberusername'])) {
            $memberData = $dbClass->query('SELECT * FROM members WHERE username = :username',
          array(
          ':username' => $_POST['meberusername']
          ));
    }else{
      header( 'location: ../friends.php' );
      exit();
    }
}
else
{
    header( 'location: login.php' );
    exit();
}

$from = $_POST['emailUser'];
$to = $memberData[0]['email'];
$naam = $_POST['naam'];
$subject = $_POST['subject'];
$comment = $_POST['message'];

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'tls://smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "thisisme.message@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "thisisme123";

//Set who the message is to be sent from
$mail->setFrom($from, $naam);

//Set an alternative reply-to address
$mail->addReplyTo($from);

//Set who the message is to be sent to
$mail->addAddress($to);

//Set the subject line
$mail->Subject = $subject;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body;

//Replace the plain text body with one created manually
$mail->Body = $comment;

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    //echo "Message sent!";
    header( 'location: ../friends.php' );
      exit();
}


?>