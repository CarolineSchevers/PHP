<?php 

include 'carddeck.php';
include 'reset_scores.php';

$rand_card; // global
$game_log = []; // global

// 0 = player
// 1 = dealer
$active_player = 0;

// Constructor to create the players
class Blackjack {
    public $wins;
    public $score = array();
    public $totalscore;
    public $hand = array();
    
    function hit() {
        // echo "new cards please";
        global $deck;
        
        // pick a random value out of the array $deck
        global $rand_card;
        $rand_card = array_rand($deck); // Pulls a random card
        $rand_value =  $deck[$rand_card]; // Gives the value

        // push card into hand array player
        $this->hand[] = $rand_card;

        // push value card into score array player
        $this->score[] = $rand_value;

        // adds the score to player totalscore
        $this->add_score();

    }

    // function to add the score to the players totalscore
    public function add_score() {
    $this->score;
    $this->totalscore = 0;
    // $this->aces;

        foreach($this->score as $score_value) {
            $this->totalscore += $score_value;
        };

        $this->check_hand();

        //Set aces to value 1 if necessary
        while (($this->totalscore > 21) and ($this->aces > 0)) {
                $this->totalscore -= 10;
                $this->aces--;
        }
    }
    
    public function check_hand() {
        // Check hand for ACES
        $this->hand;
        $this->aces = 0;

        foreach($this->hand as $card) {
            if(strpos($card, 'A') !== false) {
                $this->aces++;
            }
        }
    }

    public function stand() {
    // $dealer->totalscore < 15 hit
    // $dealer->totalscore >= 17 checkwinner
        while($this->totalscore < 17) {
            $this->hit();
        };
        // if ($this->totalscore >= 17) {
        //     global $dealer;
        //     echo '<img src="images/' . $dealer->hand[1] .'.png" class="playerCard" width="100px" height="auto">';
        // }
    }

    public function surrender() {
        echo "whoops I lost";
        new_game();
    }
}

function check_loser($person) {
    global $player;
    global $dealer;
    $player->name = "Player";
    $dealer->name = "Dealer";
    if ($person->totalscore > 21) { 
    echo "$person->name loses, his score was $person->totalscore .";
    }
}

function check_winner($person) {
 global $player;
 global $dealer;
 $player->name = "Player";
 $dealer->name = "Dealer";

 global $dealer;
 $x = $player->totalscore;
 $y = $dealer->totalscore;

switch ($s = $person->totalscore ) {
 case $s > 21: 
    echo "$person->name loses, his score was $person->totalscore .";
    break;
 case $s === 21:
    if ($x === 21 && $y === 21) {
        echo "Dealer wins";
    } else {
    echo "$person->name wins, because he was $person->totalscore .";};
    break;
case $s < 21:
    if ($x < $y) { echo "Dealer wins";}; 
    if ($x > $y) { echo "Player wins";};
    if ($x === $y) { echo "Dealer wins";};
    break;
case (($s <21) && (count($person->hand) < 6)):
    echo "Player wins";
}
// function endturn()
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