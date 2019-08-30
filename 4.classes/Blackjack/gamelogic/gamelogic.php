<?php 
session_start(); //Start the session
include 'gamelogic/carddeck.php';
include 'gamelogic/functions.php';
include 'gamelogic/blackjack.php';

//Make the player and the dealer
$player = new Blackjack();
$dealer = new Blackjack();

//Save the hand, score and wins in the session
$player->hand = $_SESSION['playerhand'];
$player->score = $_SESSION['playerscore'];
$player->wins = $_SESSION['playerwins'];

$dealer->hand = $_SESSION['dealerhand'];
$dealer->score = $_SESSION['dealerscore'];
$dealer->wins = $_SESSION['dealerwins'];

//If the hand is empty, give the player and the dealer 2 cards
if((!isset($_SESSION['playerhand'])) AND (!isset($_SESSION['dealerhand']))){
  start_game(); 
  check_loser($dealer);
  check_21($person);
};

// Makes the sum of the score-values
$dealer->add_score();
$player->add_score();

//When pushing the hit-button
if(isset($_GET["hit"])){
  //Store active player in session
  $active_player = $_SESSION['activeplayer'];
  //Get stored active player
  $_SESSION['activeplayer'] = $active_player;
  //If the active player is player (= 0)
  if($active_player === 0){
  //   //The player hits
  //   $player->hit();   
  // };
  // check_loser($player);
    $x = $player->totalscore;
    if($x >= 21) {
      check_winner($person);
    } else {
      $player->hit();
      check_loser($player);
    }
  }
};

//When pushing the stand-button, the turn goes to the dealer
if (isset ($_GET["stand"])){

  $active_player = 1; // start dealer turn
  $_SESSION['activeplayer'] = $active_player;
  
  // Dealers gets hit after stand is clicked
  $dealer->stand();

  // Check winner
  check_winner($dealer);
};

//When pushing the surrender-button
if (isset($_GET["surrender"])){
  echo "Player gives up this round. Dealer wins.";
  $dealer->wins++;
}

if (isset($_GET["newround"])){
  new_round();
}

if (isset($_GET["newgame"])){
  //session_destroy() destroys all of the data associated with the current session.
  session_destroy();
  //Go to game.php
  header("location: game.php");
}

//Get the stored values (hand, score and active player) out of the session
$_SESSION['playerhand'] = $player->hand;
$_SESSION['playerscore'] = $player->score;
$_SESSION['playerwins'] = $player->wins;

$_SESSION['dealerhand'] = $dealer->hand;
$_SESSION['dealerscore'] = $dealer->score;
$_SESSION['dealerwins'] = $dealer->wins;

$_SESSION['activeplayer'] = $active_player;

?>