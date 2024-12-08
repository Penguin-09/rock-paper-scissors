<?php

session_start();

// Redirect the user to the game
if (isset($_POST['PVESubmit'])) {
    $_SESSION['gameMode'] = "PvE";
    header("Location: game.php");
    exit();
} else if (isset($_POST['PVPSubmit'])) {
    $_SESSION['gameMode'] = "PvP";
    header("Location: game.php");
    exit();
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

    <!-- PvE Option -->
    <div class="startFormContainer"> 
        <form method="POST" action="start.php" class="startForm">
            <input type="submit" value="Speel tegen de computer" id="PVESubmit" name="PVESubmit" class="startButton">
        </form>
    </div>
    
    <!-- PvP OPTION -->
    <div class="startFormContainer">
        <form method="POST" action="start.php" class="startForm">
            <input type="submit" value="Speel tegen een andere speler" id="PVPSubmit" name="PVPSubmit" class="startButton">
        </form>
    </div>

</body>

</html>