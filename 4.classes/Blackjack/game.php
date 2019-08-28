<?php include 'gamelogic/play_game.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Blackjack</title>
  <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>

  <div class='infobox'>
    <div>
      <h2>Player:</h2>

      <?php 
          echo "<br>";
          echo '<img src="images/' . $player->hand[0] .'.png" class="playerCard" width="100px" height="auto">';
          echo '<img src="images/' . $player->hand[1] .'.png" class="playerCard" width="100px" height="auto">';
          if (count($player->hand) < 3) {
            echo '<img src="images/cardback.png" class="playerCard" width="100px" height="auto">';
          } else { echo '<img src="images/' . $player->hand[2] .'.png" class="playerCard" width="100px" height="auto">';};
          if (count($player->hand) < 4) {
            echo '<img src="images/cardback.png" class="playerCard" width="100px" height="auto">';
          } else { echo '<img src="images/' . $player->hand[3] .'.png" class="playerCard" width="100px" height="auto">';};
          if (count($player->hand) < 5) {
            echo '<img src="images/cardback.png" class="playerCard" width="100px" height="auto">';
          } else { echo '<img src="images/' . $player->hand[4] .'.png" class="playerCard" width="100px" height="auto">';};
          echo "<br>";
          echo "<p> Player totalscore: $player->totalscore </p>";
          echo "<br>";
    ?>
    </div>
    <div>
      <h2>Dealer:</h2>
      <?php
          echo "<br>";
          echo '<img src="images/' . $dealer->hand[0] .'.png" class="playerCard" width="100px" height="auto">';
          echo '<img src="images/' . $dealer->hand[1] .'.png" class="playerCard" width="100px" height="auto">';
          if (count($dealer->hand) < 3) {
            echo '<img src="images/cardback.png" class="playerCard" width="100px" height="auto">';
          } else { echo '<img src="images/' . $dealer->hand[2] .'.png" class="playerCard" width="100px" height="auto">';};
          if (count($dealer->hand) < 4) {
            echo '<img src="images/cardback.png" class="playerCard" width="100px" height="auto">';
          } else { echo '<img src="images/' . $dealer->hand[3] .'.png" class="playerCard" width="100px" height="auto">';};
          if (count($dealer->hand) < 5) {
            echo '<img src="images/cardback.png" class="playerCard" width="100px" height="auto">';
          } else { echo '<img src="images/' . $dealer->hand[4] .'.png" class="playerCard" width="100px" height="auto">';};
          echo "<br>";
          echo "<p> Dealer totalscore: $dealer->totalscore </p>";
          echo "<br>";
      ?>
    </div>
  </div>

  <form action="" method="GET">
    <input type="submit" value="Hit" name="hit">
    <input type="submit" value="Stand" name="stand">
    <input type="submit" value="Surrender" name="surrender">
  </form>

</body>

</html>