<?php
/* session_start();

$email = $_SESSION['email'];
$street = $_SESSION['street'];
$streetnumber = $_SESSION['streetnumber'];
$city = $_SESSION['city'];
$zipcode = $_SESSION['zipcode']; */

$email = $street = $streetnumber = $city = $zipcode = '';
$errors = array('email'=>'', 'street'=>'', 'streetnumber'=>'', 'city'=>'', 'zipcode'=>'');
$isFormValid = true;
$confirmMsg = '';
$deliveryMsg = '';

if(isset($_POST['submit'])){

    //check for empty fields

    if(empty($_POST['email'])){
        $errors['email'] = 'an email is required';
        $isFormValid = false;
    } 
    else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'email must be valid email address';
            $isFormValid = false;
        } else {
            $isFormValid = true;
        }
    }

    if(empty($_POST['street'])){
        $errors['street'] = 'a street is required';
        $isFormValid = false;
    } 
    else {
        $street = $_POST['street'];
        /* if(preg_match('/^[a-zA-Z\s]*$/'), $street){
            $errors['street'] = 'street must be letters and spaces only';
        } */
    }

    if(empty($_POST['streetnumber'])){
        $errors['streetnumber'] = 'a streetnumber is required';
        $isFormValid = false;
    } 
    else {
        $streetnumber = $_POST['streetnumber'];
        if(!is_numeric($streetnumber)){
            $errors['streetnumber'] = 'streetnumber must be a number';
            $isFormValid = false;
        } else {
            $isFormValid = true;
        }
    }

    if(empty($_POST['city'])){
        $errors['city'] = 'a city is required';
        $isFormValid = false;
    } 
    else {
        $city = $_POST['city'];
    }
    
    if(empty($_POST['zipcode'])){
        $errors['zipcode'] = 'a zipcode is required';
        $isFormValid = false;
    } 
    else {
        $zipcode = $_POST['zipcode'];
        if(!is_numeric($zipcode)){
            $errors['zipcode'] = 'zipcode must be a number';
            $isFormValid = false;
        } else {
            $isFormValid = true;
        }
    }
    //print_r($errors);
    if (!(array_filter($errors)) && $isFormValid == true){
        //echo 'order confirmed!';
        $confirmMsg = 'your order has been sent successfully!';
    }
    $now = date("h:i:sa");
    $normalD = date("h:i:sa", strtotime('+ 2 hours', $now));
    if($_POST['delivery'] == 'normal'){
        $deliveryMsg = 'delivery will be at ' . $normalD;
    }
    if($_POST['delivery'] == 'express'){
        $deliveryMsg = date("h:i:sa") + 2700 . 'you chose express delivery';
    }
}

setcookie('totalValue', $totalValue, time() + 86400);

?>