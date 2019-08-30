<?php 
$rand_card; // global

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
        // Check if the player has 5 cards and less than 21 points. If so, the player wins
        if ((count($this->hand) == 5) && ($this->totalscore < 21)) {
            global $player;
            echo "$this->name wins";
            return $player->wins++;
        }
    }

    public function stand() {
    // $dealer->totalscore < 15 hit
    // $dealer->totalscore >= 17 checkwinner
        echo "Player choose stand.";
        echo "<br>";
        
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
    }
}
?>