<?php

function start_game() {
    global $player;
    global $dealer;
    //Player gets 2 cards to start
    $player->hit();
    $player->hit();
    //Dealer gets 2 cards to start
    $dealer->hit();
    $dealer->hit();
};

function check_loser($person) {
    global $player;
    global $dealer;
    $player->name = "Player";
    $dealer->name = "Dealer";

    $x = $player->totalscore;
    $y = $dealer->totalscore;

    if ($x > 21) { 
        echo "$person->name loses, his score was $person->totalscore .";
        $dealer->wins++;
    }
    if ($y > 21) {
        echo "$person->name loses, his score was $person->totalscore .";
        $player->wins++;
    }
};

function check_21($person) {
    global $player;
    global $dealer;
    $s = $person->totalscore;
    $x = $player->totalscore;
    $y = $dealer->totalscore;

    if ($s === 21) {
        if ($x === 21 && $y === 21) {
            echo "Dealer wins.";
            $dealer->wins++;
        } else if ($x === 21 && $y != 21){
            echo "$person->name wins, because his score was $person->totalscore .";
            return $player->wins++;
        } else {
            echo "$person->name wins, because his score was $person->totalscore .";
            return $dealer->wins++;
        }
    }
};

function check_winner($person) {
    global $player;
    global $dealer;
   
    $x = $player->totalscore;
    $y = $dealer->totalscore;
   
    check_21($person);
   
   switch ($s = $person->totalscore ) {
    case $s > 21: 
       if($x > 21 && $y > 21) {
           echo "The score of the player and the dealer was above 21.";
        } else if ($x > 21 && $y <= 21) {
           echo "Player loses, his score was " . $player->totalscore . ". <br> Dealer wins.";
           return $dealer->wins++;
        } else { 
           echo "Dealer loses, his score was " . $dealer->totalscore . ". <br> Player wins.";
           return $player->wins++;
        }
       break;
   case $s < 21:
       if ($x < $y) { 
           echo "Dealer wins.";
           return $dealer->wins++;
       }; 
       if ($x > $y) { 
           echo "Player wins.";
           return $player->wins++;
       };
       if ($x === $y) { 
           echo "Dealer wins.";
           return $dealer->wins++;
       };
       break;
   }
};

function new_round() {
    global $player;
    global $dealer;
    global $person;

    $player->hand = [];
    $dealer->hand = [];
    $player->score = [];
    $dealer->score = [];

    session_start();
    start_game();
    check_loser($dealer);
    check_21($person);
};

// function show_first_value() {
//     global $dealer;
    
//     if (count($dealer->hand) < 3) {
//       echo "<p> Score dealer: " . $dealer->score[0] . "</p>";
//     } else {
//         echo "<p> Score dealer: $dealer->totalscore </p>";
//     }
//   }
?>