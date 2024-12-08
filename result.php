<?php

session_start();

$gameMode = $_SESSION['gameMode'];

if (isset($_SESSION['player1Choice'])) {
    $player1Choice = $_SESSION['player1Choice'];
}

if (isset($_SESSION['player2Choice'])) {
    $player2Choice = $_SESSION['player2Choice'];
}

// Both players choose the same option
if ($player1Choice == $player2Choice) {
    $winner = "Gelijkspel";
    $winningPlay = $player1Choice;
}

// Player 1 wins
if ($player1Choice == "Steen" && $player2Choice == "Schaar" || $player1Choice == "Papier" && $player2Choice == "Steen" || $player1Choice == "Schaar" && $player2Choice == "Papier") {
    $winner = "Speler 1";
    $winningPlay = $player1Choice;
}

// Player 2 wins
if ($player2Choice == "Steen" && $player1Choice == "Schaar" || $player2Choice == "Papier" && $player1Choice == "Steen" || $player2Choice == "Schaar" && $player1Choice == "Papier") {
    $winner = "Speler 2";
    $winningPlay = $player2Choice;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Game</title>
</head>

<body>
    <h1>Steen Papier Schaar
        <br>🪨ㅤㅤ📄ㅤㅤ✂️
    </h1>
    <div class="container">
        <div class="speler1result">
            <h2>Speler 1</h2>
            <p>Speler 1 heeft gekozen voor:
                <?php
                if (isset($player1Choice)) {
                    echo $player1Choice . "!";
                }
                ?></p>
        </div>
        <br><br><br>

        <div class="speler2result">
            <?php

            if ($gameMode == "PvE") {
                echo "<h2>Computer</h2>";
                echo "<p> De computer heeft gekozen voor: " . $player2Choice . "!</p>";
            } else {
                echo "<h2>Speler 2</h2>";
                echo "<p>Speler 2 heeft gekozen voor: " . $player2Choice . "!</p>";
            }

            ?>

        </div>
    </div>

    <br><br><br><br>




    <div class="resultContainer">
        <h2>
            <?php

            if ($winner === "Gelijkspel") {
                if ($gameMode == "PvE") {
                    echo "De computer koos ook " . $player1Choice . ", het is een gelijkspel!";
                } else {
                    echo "Beide spelers hebben " . $player1Choice . " gekozen!<br> Het is gelijkspel!";
                }
            } else {
                if ($gameMode == "PvE") {
                    if ($winner == "Speler 1") {
                        echo "$winner heeft gewonnen door " . $player1Choice . " te gebruiken!";
                    } else {
                        $winner = "De computer";
                        echo $winner . " heeft gewonnen door " . $player2Choice . " te gebruiken!";
                    }
                } else {
                    echo $winner . " heeft gewonnen door " . $winningPlay . " te gebruiken!";
                }
            }

            ?>
        </h2>
    </div>





    <br><br><br>
    <div class="playAgain">
        <a href="start.php" class="font">Nog een keer spelen?</a>
    </div>


</body>

</html>