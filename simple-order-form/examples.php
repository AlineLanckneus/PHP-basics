PHP file: validation.php

In the below script, we validate all fields and then mail the message using PHP mail() function. Also, the sender will get the copy of his mail.


<?php // Initialize variables to null.
$name =""; // Sender Name
$email =""; // Sender's email ID
$purpose =""; // Subject of mail
$message =""; // Sender's Message
$nameError ="";
$emailError ="";
$purposeError ="";
$messageError ="";
$successMessage =""; // On submittingform below function will execute.
if(isset($_POST['submit'])) { // Checking null values in message.
if (empty($_POST["name"])){
$nameError = "Name is required";
}
else
 {
$name = test_input($_POST["name"]); // check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$name))
{
$nameError = "Only letters and white space allowed";
}
} // Checking null values inthe message.
if (empty($_POST["email"]))
{
$emailError = "Email is required";
}
else
 {
$email = test_input($_POST["email"]);
} // Checking null values inmessage.
if (empty($_POST["purpose"]))
{
$purposeError = "Purpose is required";
}
else
{
$purpose = test_input($_POST["purpose"]);
} // Checking null values inmessage.
if (empty($_POST["message"]))
{
$messageError = "Message is required";
}
else
 {
$message = test_input($_POST["message"]);
} // Checking null values inthe message.
if( !($name=='') && !($email=='') && !($purpose=='') &&!($message=='') )
{ // Checking valid email.
if (preg_match("/([w-]+@[w-]+.[w-]+)/",$email))
{
$header= $name."<". $email .">";
$headers = "FormGet.com"; /* Let's prepare the message for the e-mail */
$msg = "Hello! $name Thank you...! For Contacting Us.
Name: $name
E-mail: $email
Purpose: $purpose
Message: $message
This is a Contact Confirmation mail. We Will contact You as soon as possible.";
$msg1 = " $name Contacted Us. Hereis some information about $name.
Name: $name
E-mail: $email
Purpose: $purpose
Message: $message "; /* Send the message using mail() function */
if(mail($email, $headers, $msg ) && mail("receiver_mail_id@xyz.com", $header, $msg1 ))
{
$successMessage = "Message sent successfully.......";
}
}
else
{ $emailError = "Invalid Email";
 }
 }
} // Function for filtering input values.function test_input($data)
{
$data = trim($data);
$data =stripslashes($data);
$data =htmlspecialchars($data);
return $data;
}
?>

PHP File: sanitization.php
In this php script filter_var() filter function is used for sanitization and validation. Here we have an HTML form with three input fields namely: name, email and website.  As user fills all information and clicks on submit button all input fields will be sanitized and validated using filters.


<?php
// Initializing Error Variables To Null.
$nameError ="";
$emailError ="";
$websiteError ="";
// This code block will execute when form is submitted
if(isset($_POST['submit'])){
/*--------------------------------------------------------------
Fetch name value from URL and Sanitize it
--------------------------------------------------------------*/
if($_POST['name'] != ""){
// Sanitizing name value of type string
$_POST['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$nameError = "<span class="valid">"".$_POST['name']."" </span>is Sanitized an Valid name.";
if ($_POST['name'] == ""){
$nameError = "<span class="invalid">Please enter a valid name.</span>";
}
}
else {
$nameError = "<span class="invalid">Please enter your name.</span>";
}
/*------------------------------------------------------------------
Fetch email value from URL, Sanitize and Validate it
--------------------------------------------------------------------*/
if($_POST['email'] != ""){
//sanitizing email
$_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
//After sanitization Validation is performed
$_POST['email'] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$emailError = "<span class="valid">"".$_POST['email']."" </span>is Sanitized an Valid Email.";
if($_POST['email'] == ""){
$emailError = "<span class="invalid">Please enter a valid email.</span>";
}
}
else {
$emailError = "<span class="invalid">Please enter your email.</span>";
}
/*---------------------------------------------------------------------------
Fetch website value from URL, Sanitize and Validate it
----------------------------------------------------------------------------*/
if($_POST['website'] != ""){
//sanitizing URL
$_POST['website'] = filter_var($_POST['website'], FILTER_SANITIZE_URL);
//After sanitization Validation is performed
$_POST['website'] = filter_var($_POST['website'], FILTER_VALIDATE_URL);
$websiteError = "<span class="valid">"".$_POST['website']."" </span>is Sanitized an Valid Website URL.";
if ($_POST['website'] == ""){
$websiteError = "<span class="invalid">Please enter a valid website start with http:// </span>";
}
}
else {
$websiteError = "<span class="invalid">Please enter your website URL.</span>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Form Sanitization and Validation Using PHP - Demo Preview</title>
<meta content="noindex, nofollow" name="robots">
<link href="style.css" rel="stylesheet">
</head>
<body>
<div class="maindiv">
<div class="form_div">
<div class="title">
<h2>Form Sanitization and Validation Using PHP</h2>
</div>
<form action="sanitization.php" method="post">
<h2>Form</h2>
<p>* Required Fields</p>
Name: <span class="invalid">*</span>
<input class="input" name="name" type="text" value="">
<p><?php echo $nameError;?></p>
E-mail: <span class="invalid">*</span>
<input class="input" name="email" type="text" value="">
<p><?php echo $emailError;?></p>
Website: <span class="invalid">*</span>
<input class="input" name="website" type="text" value="">
<p><?php echo $websiteError;?></p><input class="submit" name="submit" type="submit" value="Submit">
</form>
</div>
</div> <!-- HTML Ends Here -->
</body>
</html>
Copy
