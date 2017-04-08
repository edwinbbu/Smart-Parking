<?php

    ini_set( 'display_errors', 1 );
    
    error_reporting( E_ALL );
    
    $from = "smartparking@smartparking";
    
    $to = "edwinbbu@gmail.com";
    
    $subject = "Registration successfull";
    $username="edwin";
    $message = "You have successfully registered.\nusername: $username \n";
    
    $headers = "From:" . $from;
    
    mail($to,$subject,$message, $headers);
    
    echo "The email message was sent.";
?>