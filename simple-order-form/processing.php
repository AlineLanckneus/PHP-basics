<?php
    //declaring variables and setting them to empty strings
    $email = $street = $streetNumber = $city = $zipcode = $deliveryType = "";
    $emailErr1 = $emailErr2 = $streetErr = $streetNumberErr1 = $streetNumberErr2 = $cityErr = $zipcodeErr1 = $zipcodeErr2 = "";
    $count = 0;
    $isFormValid = false;
    
function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

    //if(filter_has_var(INPUT_POST, 'submit')){
    //if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /*if(isset($_POST['submit'])){ 
            session_start();
            $_SESSION['email'] = htmlentities($_POST['email']);
            $_SESSION['street'] = htmlentities($_POST['street']);
            $_SESSION['streetnumber'] = htmlentities($_POST['streetnumber']);
            $_SESSION['city'] = htmlentities($_POST['city']);
            $_SESSION['zipcode'] = htmlentities($_POST['zipcode']);
            header('location: form-view.php');
        }*/

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $isFormValid = true;
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
        if ($isFormValid == true){
            if (!empty($_POST['products'])) {
            echo '<div class="container alert alert-success">Your order was successfully sent!
                <br>Check your mailbox for a confirmation email!</div>';
            foreach ($_POST['products'] as $i => &$product) {
                // ADDS PRICE TO THE TOTAL
                $totalValue += ($products[$i]['price']);
                }
            }
        }
        
        setcookie('totalValue', $totalValue, time() + (86400), "/");
};

?>