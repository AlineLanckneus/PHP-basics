<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);
//we are going to use session variables so we need to enable sessions
session_start();
//declaring variables and setting them to empty strings
$email = $street = $streetNumber = $city = $zipcode = "";
$emailErr1 = $emailErr2 = $streetErr = $streetNumberErr = $cityErr = $zipcodeErr = "";

function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //check for email input
        if(empty($_POST['email'])){
            $emailErr1 = 'E-mail is required<br>';
            echo 'email is required<br>';
        } else {
            $email = test_input($_POST['email']);
            //check for email validity
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr2 = 'Invalid email format';
                echo 'invalid email format';
            }
        }
        if(empty($_POST['street'])){
            $streetErr = 'Street is required<br>';
            echo 'street is required<br>';
        } else {
            $street = test_input($_POST['street']);
            echo 'street is valid<br>';
            }

        if(empty($_POST['streetnumber'])){
            $streetNumberErr = 'Street number is required<br>';
            echo 'streetnumber is required<br>';
        } else {
            $streetNumber = test_input($_POST['streetnumber']);
            //check if streetnumber is number format
            if(!is_numeric($streetNumber)){
                echo 'streetnumber needs to be a number<br>';
            }
            
        }
        if(empty($_POST['city'])){
            $cityErr = 'City is required<br>';
            echo 'city is required<br>';
        } else { 
            $city = test_input($_POST['city']);
            echo 'city is valid<br>';
        }

        if(empty($_POST['zipcode'])){
            $zipcodeErr = 'Zipcode is missing<br>';
            echo 'zipcode is required<br>';
        } else {
            $zipcode = test_input($_POST['zipcode']);
            //check if zipcode is number format
            if(!is_numeric($zipcode)){
                echo 'zipcode needs to be a number<br>';
            }
        }
        
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
whatIsHappening();
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