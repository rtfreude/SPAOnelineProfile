<?php

require 'vendor/autoload.php';

// check if fields passed are empty
if(empty($_POST['name'])        ||
   empty($_POST['email'])       ||
   empty($_POST['phone'])       ||
   empty($_POST['message'])     ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
    echo "No arguments Provided!";
    return false;
   }
<script>
    console.log(<?= json_encode($name); ?>);
</script>

$name = $_POST['name'];

$email_address = $_POST['email'];
$from = new SendGrid\Email("user", "$email_address");
$phone = $_POST['phone'];
$message = $_POST['message'];

// create email body and send it
$to = new SendGrid\Email("Example User", "freudehack@gmail.com"); // put your email
$email_subject = "Contact form submitted by:  $name";
$content = new SendGrid\Content("text/plain", "You have received a new message. \n\n".
                  " Here are the details:\n \nName: $name \n ".
                  "Email: $from\n Phone: $phone\n Message: \n $message");

$mail = new SendGrid\Mail($from, $email_subject, $to, $content);
$apiKey = getenv('SENDGRID_API_KEY');
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
print_r($response->headers());
echo $response->body();
?>






