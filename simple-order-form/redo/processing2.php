<?php
$email = $street = $streetnumber = $city = $zipcode = '';
$errors = array('email'=>'', 'street'=>'', 'streetnumber'=>'', 'city'=>'', 'zipcode'=>'');

if(isset($_POST['submit'])){

    //check for empty fields

    if(empty($_POST['email'])){
        $errors['email'] = 'an email is required';
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'email must be valid email address';
        }
    }

    if(empty($_POST['street'])){
        $errors['street'] = 'a street is required';
    } else {
        $street = $_POST['street'];
    }
    if(empty($_POST['streetnumber'])){
        $errors['streetnumber'] = 'a streetnumber is required';
    } else {
        $streetnumber = $_POST['streetnumber'];
        if(!is_numeric($streetnumber)){
            $errors['streetnumber'] = 'streetnumber must be a number';
        }
    }
    if(empty($_POST['city'])){
        $errors['city'] = 'a city is required';
    } else {
        $city = $_POST['city'];
    }
    if(empty($_POST['zipcode'])){
        $errors['zipcode'] = 'a zipcode is required';
    } else {
        $zipcode = $_POST['zipcode'];
        if(!is_numeric($zipcode)){
            $errors['zipcode'] = 'zipcode must be a number';
        }
    }
    //print_r($errors);
}

?>