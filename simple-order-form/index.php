<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);
//we are going to use session variables so we need to enable sessions



session_start();
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
//declaring variables and setting them to empty strings
    $email = $street = $streetNumber = $city = $zipcode = $deliveryType = "";
    $emailErr1 = $emailErr2 = $streetErr = $streetNumberErr1 = $streetNumberErr2 = $cityErr = $zipcodeErr1 = $zipcodeErr2 = "";
    $count = 0;
    $isFormValid = true;
function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

    //if(filter_has_var(INPUT_POST, 'submit')){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //check for email input
        if(empty($_POST['email'])){
            $emailErr1 = '* E-mail is required<br>';
            $isFormValid = false;
        } else {
            $email = test_input($_POST['email']);
            $count++;
            //$formFilled++;
            //check for email validity
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr2 = '* Invalid email format';
                $isFormValid = false;
                
            }
        }
        if(empty($_POST['street'])){
            $streetErr = '* Street is required<br>';
            echo 'street is required<br>';
            $isFormValid = false;
        } else {
            $street = test_input($_POST['street']);
            $count++;
            //$formFilled++;
            //echo 'street is valid<br>';
            }

        if(empty($_POST['streetnumber'])){
            $streetNumberErr1 = '* Street number is required<br>';
            echo 'streetnumber is required<br>';
            $isFormValid = false;
        } else {
            $streetNumber = test_input($_POST['streetnumber']);
            $count++;
            //$formFilled++;
            //check if streetnumber is number format
            if(!is_numeric($streetNumber)){
                $streetNumberErr2 = '* Street number needs to be number format<br>';
                echo 'streetnumber needs to be a number<br>';
                $isFormValid = false;
            }
            
        }
        if(empty($_POST['city'])){
            $cityErr = '* City is required<br>';
            echo 'city is required<br>';
            $isFormValid = false;
        } else { 
            $city = test_input($_POST['city']);
            $count++;
            //$formFilled++;
            //echo 'city is valid<br>';
        }

        if(empty($_POST['zipcode'])){
            $zipcodeErr1 = '* Zipcode is required<br>';
            echo 'zipcode is required<br>';
            $isFormValid = false;
        } else {
            $zipcode = test_input($_POST['zipcode']);
            $count++;
            //check if zipcode is number format
            if(!is_numeric($zipcode)){
                $zipcodeErr2 = '* Zipcode needs to be number format<br>';
                $isFormValid = false;
            }
        }
        $_SESSION['email'] = htmlspecialchars($_POST['email']);
        $_SESSION['street'] = htmlspecialchars($_POST['street']);
        $_SESSION['streetnumber'] = htmlspecialchars($_POST['streetnumber']);
        $_SESSION['city'] = htmlspecialchars($_POST['city']);
        $_SESSION['zipcode'] = htmlspecialchars($_POST['zipcode']);
        };


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

$totalValue = '0';
if($_POST['products'][0] == 1){
                echo 'club ham!';
                $totalValue+= 3.20;
            } 
            if($_POST['products'][1] == 1){
                echo 'club cheese!';
                $totalValue+= 3;
            } 
            if($_POST['products'][2] == 1){
                echo 'club cheese & ham!';
                $totalValue+= 4;
            } 
            if($_POST['products'][3] == 1){
                echo 'club chicken!';
                $totalValue+= 4;
            } 
            if($_POST['products'][4] == 1){
                echo 'club salmon!';
                $totalValue+= 5;
            } 
echo $totalValue;
require 'form-view.php';