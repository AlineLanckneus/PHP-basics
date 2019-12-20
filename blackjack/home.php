
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BlackJack Game</title>
</head>
<body>
    <h1>Welcome To Jack Black's BlackJack Game!</h1>

    <h2>These are the rules:</h2>
    <ul>
        <li>Cards are between 1-11 points.</li>
        <li>Getting more than 21 points, means that you lose.</li>
        <li>Getting 21 points with your first two cards, means you have a blackjack.</li>
        <li>To win, you need to have more points than the dealer, but not more than 21</li>
        <li>The dealer is obligated to keep taking cards until they have at least 15 points.</li>
    </ul>

    <form action="game.php" method="post"> 
        <input type="button" name="submit" value="Start The Game!"></input>
    </form>
</body>
</html>