<?php
//prevent header injections
//if (!isset($_POST['submit'])) {
//   echo "<h1>Error</h1>\n
//      <p>Accessing this page directly is not allowed.</p>";
//   exit;
//}
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "shannongra94@gmail.com";
    $to = "shannongra94@gmail.com, shannonsgraham@gmail.com";
    $subject = "Checking PHP mail";
    $message = "PHP mail works just fine";
    $headers = 'From: '.$from."\r\n";
    $headers .= 'Bcc: '.$to."\r\n";
    mail(null,$subject,$message, $headers);
    echo "The email message was sent.";
?>