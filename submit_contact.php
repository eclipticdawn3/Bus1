<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $to = 'bobwakler4@gmail.com';
  $subject = 'Contact Form Submission from BUSONE Website';

  $body = "Name: $name \n";
  $body .= "Email: $email \n";
  $body .= "Message: \n $message";

  $headers = array(
    'From' => $email,
    'Reply-To' => $email,
    'Content-Type' => 'text/plain; charset=UTF-8'
  );

  if (mail($to, $subject, $body, $headers)) {
    echo 'Your message has been sent successfully!';
  } else {
    echo 'There was an error sending your message. Please try again later.';
  }
} else {
  header('Location: contact.php');
  exit();
}
?>