<?php
  // Based on code from http://www.html-form-guide.com/email-form/php-form-to-email.html

  // This page should not be accessed directly. Need to submit the form.
  if(!isset($_POST['submit'])) {
    exit("Error: You need to submit the form!");
  }

  // Get values from POST and trim leading/trailing whitespace
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $message = trim($_POST['message']);

  // Validate first
  if(empty($name) || empty($email) || empty($message)) {
    exit("Error: All fields are mandatory!");
  }

  // XSS check
  if(IsInjected($name) || IsInjected($email) || IsInjected($message)) {
    exit("Error: Bad form value!");
  }

  // Double-check field lengths just in case HTML5 validation didn't work
  if(strlen($name) > 35 || strlen($email) > 255 || strlen($message) > 4096) {
    exit("Error: Bad length on form value!");
  }

  $domain = "jimvillanueva.com"; // Update domain info when recycling code
  $from = "webmaster@$domain";
  $subject = "New contact form submission from $domain";
  $body = "You have received a new and amazing message from $name ( $email ):\n\n $message";
  $to = "jim.villanueva@hotmail.com"; // Update this email address when recycling code
  $headers = "From: $from \r\n";
  $headers .= "Reply-To: $email \r\n";

  // Send the e-mail!
  mail($to, $subject, $body, $headers);

  // Mail sent. Redirect to thank-you page.
  header('Location: ../message-sent.php');

  // Function to validate against any email injection attempts
  function IsInjected($str) {
    $injections = array('(\n+)',
      '(\r+)',
      '(\t+)',
      '(%0A+)',
      '(%0D+)',
      '(%08+)',
      '(%09+)'
    );

    $inject = join('|', $injections);
    $inject = '/$inject/i';
    if(preg_match($inject, $str)) {
      return true;
    } else {
      return false;
    }
  }
?>