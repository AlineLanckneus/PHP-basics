<?php
    declare(strict_types = 1);
    include 'includes/class-autoload.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <title>PHP Blackjack Challenge</title>
</head>
<body>
    <div class="container-fluid title">BLACKJACK</div>
    <div class="container-fluid">
        <div class="container-fluid">
            <button class="btn btn-secondary">Start The Game!</button>
        </div>
        <div class="container-fluid">
            <form action="includes/blackjack.inc.php" method="post">
                
                <button class="btn btn-primary" type="button" name="button" value="hit">Hit</button>
                <button class="btn btn-primary" type="button" name="button" value="stand">Stand</button>
                <button class="btn btn-primary" type="button" name="button" value="surrender">Surrender</button>
            </form>
        </div>

        <div class="container-fluid">
            <div class="row"> 
                <div class="col-6 points">
                <header>Player</header> 
                </div>
                <div class="col-6 points">
                <header>Dealer</header>
                </div>
            </div>
        </div>
    
</body>
</html>