<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);
//we are going to use session variables so we need to enable sessions
session_start();
if(!empty($_POST)){ //this removed the errors when first loading the page
$_SESSION['email'] = $_POST['email'];
$_SESSION['street'] = $_POST['street'];
$_SESSION['streetnumber'] = $_POST['streetnumber'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['zipcode'] = $_POST['zipcode'];
//$_SESSION['delivery'] = $_POST['delivery'];
}
//all pages are connected to each other? so not needed to repeat this on an other page

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
if(empty($_GET['food']) || $_GET['food'] == 1){
    $products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
];
} else { 
    $products = [
        ['name' => 'Cola', 'price' => 2],
        ['name' => 'Fanta', 'price' => 2],
        ['name' => 'Sprite', 'price' => 2],
        ['name' => 'Ice-tea', 'price' => 3],
    ];
}
if($_POST['delivery'] == 'normal'){
    
}
$totalValue = $_COOKIE['totalValue'];
require 'formview.php';