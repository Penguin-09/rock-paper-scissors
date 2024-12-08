<?php

// The logic for a PvP game and a PvE game are both handled in this file

session_start();

if (isset($_SESSION['gameMode'])) {
    $gameMode = $_SESSION['gameMode'];
}

// Logic for hiding form 1
if (isset($_GET['player1Choice'])) {
    $player1Choice = $_GET['player1Choice'];
    $_SESSION['player1Choice'] = $player1Choice;

    if ($gameMode == "PvE") {
        // The computer chooses a random option
        $player2Choice = array("Steen", "Papier", "Schaar")[rand(0, 2)];
        $_SESSION['player2Choice'] = $player2Choice;

        // Send user to result page if opponent is computer
        header("Location: result.php");
    }

    $hideForm1 = true;
} else {
    $hideForm1 = false;
}

// Logic for sending user to result page
if (isset($_GET['player2Choice'])) {
    $player2Choice = $_GET['player2Choice'];
    $_SESSION['player2Choice'] = $player2Choice;
    header("Location: result.php");
}

if (isset($gameMode)) {
    $_SESSION['gameMode'] = $gameMode;	
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

    <!-- Player 1 -->
    <div class="speler1">

        <h2>Speler 1</h2>

        <?php if (!$hideForm1) : ?>
            <!-- If player 1 has not chosen -->

            <div class="player1Select">
                <form method="GET" class="dropbox">
                    <select name="player1Choice" id="player1Select">
                        <option value="Steen">🪨 Steen 🪨</option>
                        <option value="Papier">📄 Papier 📄</option>
                        <option value="Schaar">✂️ Schaar ✂️</option>
                    </select><br><br>
                    <input type="submit" value="Selecteer">
                </form>
            </div>

        <?php endif; ?>

    </div>
    <br><br><br>
    <!-- Player 2 -->
    <div class="speler2">

        <h2>Speler 2</h2>

        <?php if ($hideForm1 && $gameMode == "PvP") : ?>
            <!-- If player 1 has chosen, and gamemode is PvE -->

            <div class="player2Select">
                <form method="GET" class="dropbox">
                    <select name="player2Choice" id="player2Select">
                        <option value="Steen">🪨 Steen 🪨</option>
                        <option value="Papier">📄 Papier 📄</option>
                        <option value="Schaar">✂️ Schaar ✂️</option>
                    </select><br><br>
                    <input type="submit" value="Selecteer">
                </form>
            </div>

        <?php endif; ?>

        <?php if ($gameMode == "PvE") : ?>
            <!-- If gamemode is PvP -->

            <p>De computer is na aan het denken...</p> <!-- !!! Hier kan ook andere text ofzo -->

        <?php endif; ?>

    </div>
</body>

</html>