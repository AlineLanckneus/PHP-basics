<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);
//we are going to use session variables so we need to enable sessions
session_start();
//declaring variables and setting them to empty strings
    $email = $street = $streetNumber = $city = $zipcode = "";
    $emailErr1 = $emailErr2 = $streetErr = $streetNumberErr1 = $streetNumberErr2 = $cityErr = $zipcodeErr1 = $zipcodeErr2 = "";
    $count = 0;
function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

    if(filter_has_var(INPUT_POST, 'submit')){
        //check for email input
        if(empty($_POST['email'])){
            $emailErr1 = '* E-mail is required<br>';
        } else {
            $email = test_input($_POST['email']);
            $count++;
            //check for email validity
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr2 = '* Invalid email format';
                
            }
        }
        if(empty($_POST['street'])){
            $streetErr = '* Street is required<br>';
            echo 'street is required<br>';
        } else {
            $street = test_input($_POST['street']);
            $count++;
            //echo 'street is valid<br>';
            }

        if(empty($_POST['streetnumber'])){
            $streetNumberErr1 = '* Street number is required<br>';
            echo 'streetnumber is required<br>';
        } else {
            $streetNumber = test_input($_POST['streetnumber']);
            $count++;
            //check if streetnumber is number format
            if(!is_numeric($streetNumber)){
                $streetNumberErr2 = '* Street number needs to be number format<br>';
                echo 'streetnumber needs to be a number<br>';
            }
            
        }
        if(empty($_POST['city'])){
            $cityErr = '* City is required<br>';
            echo 'city is required<br>';
        } else { 
            $city = test_input($_POST['city']);
            $count++;
            //echo 'city is valid<br>';
        }

        if(empty($_POST['zipcode'])){
            $zipcodeErr1 = '* Zipcode is required<br>';
            echo 'zipcode is required<br>';
        } else {
            $zipcode = test_input($_POST['zipcode']);
            $count++;
            //check if zipcode is number format
            if(!is_numeric($zipcode)){
                $zipcodeErr2 = '* Zipcode needs to be number format<br>';
            }
        }
        $_SESSION['email'] = htmlspecialchars($_POST['email']);
        $_SESSION['street'] = htmlspecialchars($_POST['street']);
        $_SESSION['streetnumber'] = htmlspecialchars($_POST['streetnumber']);
        $_SESSION['city'] = htmlspecialchars($_POST['city']);
        $_SESSION['zipcode'] = htmlspecialchars($_POST['zipcode']);

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

$products_food = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];
$products_drinks = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
];

$totalValue = 0;
require 'form-view.php';