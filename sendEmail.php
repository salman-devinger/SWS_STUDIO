<?php
   $to_email = "yashyash674@gmail.com";
   $subject = "testing";
   $body = $_POST["gender"];
 
   $headers = "From: yaswanth@minifysys.com";
 
   if ( mail($to_email, $subject, $body, $headers)) {
      echo("Email successfully sent to $to_email...");
   } else {
      echo("Email sending failed...");
   }
?>