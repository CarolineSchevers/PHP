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

  $y = $dealer->totalscore;
  if ($y === 21) {
    echo "Dealer wins";
  }
};

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

//When pushing the stand-button
if (isset ($_GET["stand"])){
  global $player;
  global $dealer;
    // Start the dealer of the dealer
    $active_player = 1;
    //Get the active player out of the session
    $_SESSION['activeplayer'] = $active_player; 
    
    do {
      $dealer->hit();
      check_winner($dealer);}
    while ($dealer->totalscore < 16);
    
    check_winner($dealer);
};

//When pushing the surrender-button
if (isset($_GET["surrender"])){
  //session_destroy() destroys all of the data associated with the current session.
  session_destroy();
  //Go to game.php
  header("location: game.php");
}

//Show the score anytime
$player->add_score();
$dealer->add_score();

//Get the stored values (hand, score and active player) out of the session
$_SESSION['playerhand'] = $player->hand;
$_SESSION['dealerhand'] = $dealer->hand;

$_SESSION['playerscore'] = $player->score;
$_SESSION['dealerscore'] = $dealer->score;

$_SESSION['activeplayer'] = $active_player;

?>