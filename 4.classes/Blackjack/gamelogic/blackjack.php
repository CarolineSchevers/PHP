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

        foreach($this->score as $score_value) {
            $this->totalscore += $score_value;
        }
    }

    public function stand() {
      
        
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
    echo "$person->name loses, your score was $person->totalscore .";
    break;
 case $s === 21:
    if ($x === 21 && $y === 21) {
        echo "Dealer wins";
    }
    echo "$person->name wins, because he was $person->totalscore .";
    break;
case $s < 21:
    if ($x < $y) {
        echo "Dealer wins";
    } else { echo "Player wins";};
    break;
 default:
    echo "other one";
    break;
};
// function endturn()
};
?>