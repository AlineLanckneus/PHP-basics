<?php
/* session_start();

$email = $_SESSION['email'];
$street = $_SESSION['street'];
$streetnumber = $_SESSION['streetnumber'];
$city = $_SESSION['city'];
$zipcode = $_SESSION['zipcode']; */

$email = $street = $streetnumber = $city = $zipcode = '';
$errors = array('email'=>'', 'street'=>'', 'streetnumber'=>'', 'city'=>'', 'zipcode'=>'', 'delivery'=>'');
$isFormValid = true;
$deliveryChosen = false;
$confirmMsg = '';
$deliveryMsg = '';
$deliveryCost = 0;

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
   
    
    date_default_timezone_set('Europe/Amsterdam');
        $deliveryHour = date("h:i a", strtotime('now + 2 hours'));
        $deliveryHourExpress = date("h:i a", strtotime('now + 45 minutes'));
                        
            if(empty($_POST['delivery'])){
                $deliveryChosen = false;
                $errors['delivery'] = 'please choose one of the delivery options to complete your order';
                            
            } elseif ($_POST['delivery'] == 'normal'){
                //echo 'HEY LOOK AT ME';
                $deliveryChosen = true;
                $deliveryCost += 2;
                $deliveryMsg = 'Expected delivery at approximately: '. $deliveryHour;
                            
            } else {
                //echo 'OH HEY RICHIE RICH';
                $deliveryChosen = true;
                $deliveryCost += 4;
                $deliveryMsg = 'Expected delivery at approximately: '. $deliveryHourExpress;
                            
            }
        /* $orderTotal = $_POST['products'];
        switch($orderTotal){
            case 'Club Ham': $deliveryCost += 3.2;
            break;
            case 'Club Cheese': $deliveryCost += 3;
            break;
            case 'Club Cheese & Ham': $deliveryCost += 4;
            break;
            case 'Club Chicken': $deliveryCost += 4;
            break;
            case 'Club Salmon': $deliveryCost += 5;
            break;
            case 'Cola': $deliveryCost += 2;
            break;
            case 'Fanta': $deliveryCost += 2;
            break;
            case 'Sprite': $deliveryCost += 2;
            break;
            case 'Ice-tea': $deliveryCost += 3;
            break;
            default:
            break;
        }
        echo $deliveryCost;

 */

         //print_r($errors);
    if (!(array_filter($errors)) && $isFormValid == true && $deliveryChosen == true){
        //echo 'order confirmed!';
        $confirmMsg = 'your order has been sent successfully!<br>' . $deliveryMsg;
    }
    $to = $_POST['email'];
    $subject = 'order confirmation';
    $message = 'overview of your order: ';
    $headers = array(
    'From' => 'hamprocessors@gmail.com',
    'Reply-To' => 'hamprocessors@gmail.com',
    'X-Mailer' => 'PHP/' . phpversion());
    mail($to, $subject, $message, $headers);
}

setcookie('totalValue', $totalValue, time() + 86400);

?>