<?php 
session_start(); //Start the session
include 'gamelogic/blackjack.php';

//Make the player and the dealer
$player = new Blackjack();
$dealer = new Blackjack();

//Save the hand and store in the session
$player->hand = $_SESSION['playerhand'];
$player->score = $_SESSION['playerscore'];

$dealer->hand = $_SESSION['dealerhand'];
$dealer->score = $_SESSION['dealerscore'];

//If the hand is empty gives the player and the dealer 2 cards
if((!isset($_SESSION['playerhand'])) AND (!isset($_SESSION['dealerhand']))){
  global $player;
  global $dealer;

  $player->hit();
  $player->hit();

  $dealer->hit();
  $dealer->hit();

  check_winner($dealer);
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
    //The player hits
    $player->hit();   
  };
  check_loser($player);


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
  //session_destroy() destroys all of the data associated with the current session.
  session_destroy();
  //Go to game.php
  header("location: game.php");
}

//Get the stored values (hand, score and active player) out of the session
$_SESSION['playerhand'] = $player->hand;
$_SESSION['dealerhand'] = $dealer->hand;

$_SESSION['playerscore'] = $player->score;
$_SESSION['dealerscore'] = $dealer->score;

$_SESSION['activeplayer'] = $active_player;

?>