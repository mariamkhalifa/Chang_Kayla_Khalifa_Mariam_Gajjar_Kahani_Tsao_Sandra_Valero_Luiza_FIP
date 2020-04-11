<?php

if(empty($_POST)){
    return $msg = 'Please fill out the required fields!';
    exit;
}

if(isset($_GET['submit'])) {

//echo 'here';
//VALIDATE ALL DATA
//necessary to protect your server
$name = '';
$email = '';
$phone = '';
$message = '';
$recipient = 'sandra3dra@gmail.com';

// to make a field required, kill the function if the value is "empty"
//Use GET to pass along message ?=true or ?=false to redirect users after form is sent + make thank you message pop up in JS

if (isset($_POST['name'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
}

if (isset($_POST['email'])) {
    // if there's a line break in an email (it's very long), strip it out
   $email = str_replace(array("\r", "\n", "%0a", "%0d"),'',$_POST['email']);
   $email = filter_var($email,FILTER_VALIDATE_EMAIL);
}

if (isset($_POST['phone'])) {
    $subject = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
}

if (isset($_POST['msg'])) {
    $message = $_POST['message']; 
}

//Internet courrier validates email to protect from spam
//Ex. The courrier thinks a user is suspicious because their server and domain don't match?
//This makes sure internet sees that the email is coming from your server, and your domain, and that they match (they are not suspicious)

//SEND OUT EMAIL
$headers = array(
    'From'=> $email,
    'Reply-To'=>$name.'<'.$email.'>'
);

if(mail($recipient, $subject, $message, $headers)){
    //echo 'here';
    return $msg = 'Thank you for contacting us. We will reply within 4 business days.';
}else{
    return $msg = 'Sorry, something went wrong with the contact form. Please try calling us or visit our office during office hours.';
}

echo json_encode($msg);
}



?>
