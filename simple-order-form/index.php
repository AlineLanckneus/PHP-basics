<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);
//we are going to use session variables so we need to enable sessions
session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

    
    //check for submit
        //if(filter_has_var(INPUT_POST, 'submit')){
            //echo 'submitted';
            $email = $_POST['email'];
            $street = $_POST['street'];
            $streetNumber = $_POST['streetnumber'];
            $city = $_POST['city'];
            $zipcode = $_POST['zipcode'];

            //check for email and validity email
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo 'email is valid<br>';
            } else {
                echo 'email is invalid<br>';
            };

            //check required fields
            if(!empty($street) && !empty($streetNumber) && !empty($city) && !empty($zipcode)){
                echo 'all fields filled in<br>';
            } else {
                $streetErr = 'Missing';
                $streetNumberErr = 'Missing';
                $cityErr = 'Missing';
                $zipcodeErr = 'Missing';
                echo 'NOT all fields filled in<br>';
            };
            //check if street number and zipcode are numbers
            if(is_numeric($streetNumber) && is_numeric($zipcode)){
                echo 'streetnumber and zipcode are numbers!<br>';
            } else {
                echo 'streetnumber and/or zipcode is NOT a number<br>';
            };
        //};

    };


function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}
//whatIsHappening();
//your products with their price.
$products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];
$products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];
$totalValue = 0;
require 'form-view.php';