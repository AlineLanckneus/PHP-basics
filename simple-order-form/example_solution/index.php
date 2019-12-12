<?php
//this line makes PHP behave in a more strict way
declare(strict_types=1);
//we are going to use session variables so we need to enable sessions
session_start();

function whatIsHappening($errors)
{
  echo '<h2>$_GET</h2>';
  var_dump($_GET);
  echo '<h2>$_POST</h2>';
  var_dump($_POST);
  echo '<h2>$_COOKIE</h2>';
  var_dump($_COOKIE);
  echo '<h2>$_SESSION</h2>';
  var_dump($_SESSION);
  echo '<h2>ERRORS</h2>';
  var_dump($errors);
}

function format_input(string $input): string
{
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}

function validate_input(string $field, string $value, array $errors): array
{
  // Check if field is empty and set corresponding error
  if (empty($value)) {
    $errors[$field] = "$field can't be empty";
    return $errors;
  }
  // Check if input is valid email and set corresponding error
  if ($field == "email" && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
    $errors[$field] = "$value is not a valid email";
    return $errors;
  }
  // Check if input is a number and set corresponding error
  if (($field == "streetnumber" || $field == "zipcode") && !is_numeric($value)) {
    $errors[$field] = "$field has to be a number";
    return $errors;
  }

  // If all test are passed, store value in session
  $_SESSION[$field] = $value;
  return $errors;
};

// Products to display
if (isset($_GET["food"]) && $_GET["food"] == 0) {
  $products = [
    ['name' => 'Cola', 'price' => 2],
    ['name' => 'Fanta', 'price' => 2],
    ['name' => 'Sprite', 'price' => 2],
    ['name' => 'Ice-tea', 'price' => 3],
  ];
} else {
  $products = [
    ['name' => 'Club Ham', 'price' => 3.20],
    ['name' => 'Club Cheese', 'price' => 3],
    ['name' => 'Club Cheese & Ham', 'price' => 4],
    ['name' => 'Club Chicken', 'price' => 4],
    ['name' => 'Club Salmon', 'price' => 5]
  ];
};

// Get totalValue from cookies if it exists
if (isset($_COOKIE["totalValue"])) {
  $totalValue = $_COOKIE["totalValue"];
} else {
  $totalValue = 0;
};

$errors = [];

// Check if something was posted
if (!empty($_POST)) {
  // Loop over items of $_POST
  foreach ($_POST as $field => $value) {
    if ($field !== "products") {
      $errors = validate_input($field, format_input($value), $errors);
    }

    if (!isset($_POST["products"])) {
      $errors["products"] = "Please select one or more products";
    }
  };

  // If something was posted and we have no errors after validating the input, process the order
  if (empty($errors)) {
    $deliveryTime = date('H:i', strtotime('+2 hours'));

    foreach ($_POST["products"] as $key => $value) {
      $totalValue += $products[$key]["price"];
    };
    setcookie('totalValue', "$totalValue");
  };
};

require 'form-view.php';
