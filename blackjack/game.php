<?php

    include('blackjack.php');
    include('game-logic.php');

    session_start();

    //var_dump($_POST);
    //var_dump($_SESSION);

    if(empty($_SESSION)){

        $player = new Blackjack();
        $dealer = new Blackjack();

        $_SESSION['player'] = $player;
        $_SESSION['dealer'] = $dealer;
    } else {
        $player = $_SESSION['player'];
        $dealer = $_SESSION['dealer'];
    }

    if(isset($_POST['hit'])){
        $player->hit();
    }

    if(isset($_POST['newGame'])){
        newGame();
    }
    if(isset($_POST['stand'])){
        $player->stand();
        $dealer->isTurn = true;
        dealerTurn();
    }
    if(isset($_POST['surrender'])){
        $player->surrender();
        $dealer->isTurn = true;
        dealerTurn();
    }
    var_dump($_POST);
    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Page</title>
</head>
<body>
    <h1>Let's Play!</h1>

    <form action="" method="post">
        <button name="hit">Hit</button>
        <button name="stand">Stand</button>
        <button name="surrender">Surrender</button>

        <button name="newGame">New Game</button>
    </form>
</body>
</html>