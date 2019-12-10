<?php
    
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
        rel="stylesheet"/>
    <link rel="stylesheet" href="styles.css">
    <title>Order food & drinks</title>
</head>
<body>
<div class="container">
    <h1>Order food in restaurant "the Personal Ham Processors"</h1>
    <nav>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="?food=1">Order food</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?food=0">Order drinks</a>
            </li>
        </ul>
    </nav>
    <?php
        
        if(filter_has_var(INPUT_POST, 'submit')){
            //echo 'submitted';
            if ($isFormValid){
                echo '<div class="container alert alert-success">Your order was successfully sent!
                <br>Check your mailbox for a confirmation email!</div>';
                }
            }
        
    ?>
    <form method="post" action="<?php echo htmlspecialchars('index.php'); //this protects against injecting harmful code by hackers?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label><span class='error'><?php echo $emailErr1, $emailErr2; ?></span>
                <input type="text" id="email" name="email" class="form-control" <?php if (isset($_SESSION['email'])){ echo 'value='. $_SESSION['email'];} ?> >
            </div>
            <div></div>
        </div>

        <fieldset>
            <legend>Address</legend>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="street">Street:</label><span class="error"><?php echo $streetErr;?></span>
                    <input type="text" name="street" id="street" class="form-control" <?php if (isset($_SESSION['street'])){ echo 'value='. $_SESSION['street'];} ?> >
                </div>
                <div class="form-group col-md-6">
                    <label for="streetnumber">Street number:</label><span class="error"><?php echo $streetNumberErr1, $streetNumberErr2; ?></span>
                    <input type="text" id="streetnumber" name="streetnumber" class="form-control" <?php if (isset($_SESSION['streetnumber'])){ echo 'value='. $_SESSION['streetnumber'];} ?>>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City:</label><span class="error"> <?php echo $cityErr; ?> </span>
                    <input type="text" id="city" name="city" class="form-control" <?php if (isset($_SESSION['city'])){ echo 'value='. $_SESSION['city'];} ?>>
                </div>
                <div class="form-group col-md-6">
                    <label for="zipcode">Zipcode</label><span class="error"> <?php echo $zipcodeErr1, $zipcodeErr2; ?> </span>
                    <input type="text" id="zipcode" name="zipcode" class="form-control" <?php if (isset($_SESSION['zipcode'])){ echo 'value='. $_SESSION['zipcode'];} ?>>
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>Products</legend>
            <?php 
            
            if(empty($_GET) || $_GET['food'] == 1){ 
            foreach ($products_food AS $i => $product): ?>
                <label>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?php echo number_format($product['price'], 2) ?></label><br />
            <?php endforeach;
            } else {
                foreach ($products_drinks AS $i => $product): ?>
                <label>
                    <input type="checkbox" value="1" name="products[<?php echo $i ?>]"/> <?php echo $product['name'] ?> -
                    &euro; <?php echo number_format($product['price'], 2) ?></label><br />
            <?php endforeach; 
            } 
            ?>
        </fieldset>
        <fieldset>
            <legend>Delivery options</legend>
                <label for="normal">Normal Delivery - 2 hours</label>
                <input type="radio" name="deliveryType" value="normal" id="delivery-type" ></br>
                <label for="express">Express Delivery - 45 minutes</label>
                <input type="radio" name="deliveryType" value="express" id="delivery-type"></br>
                <?php  
                    
                    date_default_timezone_set('Europe/Amsterdam');
                    $deliveryHour = date("h:i a", strtotime('now + 2 hours'));
                    $deliveryHourExpress = date("h:i a", strtotime('now + 45 minutes'));
                        
                        if(empty($_POST['deliveryType'])){
                            echo '<div class="alert alert-info">please choose one of the delivery options to complete your order</div>';
                            
                        } elseif ($_POST['deliveryType'] == 'normal'){
                            //echo 'HEY LOOK AT ME';
                            echo '<div class="alert alert-success">Expected delivery at approximately: '. $deliveryHour . '</div>';
                            
                        } else {
                            //echo 'OH HEY RICHIE RICH';
                            echo '<div class="alert alert-success">Expected delivery at approximately: '. $deliveryHourExpress . '</div>';
                            
                        }
                    
                ?>
            
        
        </fieldset>
        <button name="submit" type="submit" class="btn btn-primary">Order!</button>
    </form>

    <footer>You already ordered <strong>&euro; <?php echo $totalValue ?></strong> in food and drinks.</footer>
</div>

<style>
    footer {
        text-align: center;
    }
</style>
</body>
</html>