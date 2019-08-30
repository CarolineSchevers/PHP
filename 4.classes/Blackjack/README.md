Result: [Blackjack](https://carolineschevers.github.io/PHP/4.classes/Blackjack/)

# Challenge: Learning Classes

|Challenge Parameters  |Challenge Details              |
|:---------------------|:------------------------------|
|Repository Folder     |`4.classes`                    |
|Challenge type        |`learning challenge`           |
|Duration              |`~3 days`                      |
|Deadline              |`26/08/2019 8h59`              |
|Deployment method     |`N/A`                          |
|Group composition     |`solo --help each other`       |

## Introduction

### Setup
1. Create a repository `Blackjack`
1. Follow the instructions step by step: commit & push at the end of every step.
1. When the instruction starts with README, write what’s asked in the README of your repository.
1. Create home.php.

### Blackjack Rules
- Cards are between 1-11 points.
- Getting more than 21 points, means that you lose.
- Getting 21 points with your first two cards, means you have a blackjack.
- To win, you need to have more points than the dealer, but not more than 21.
- The dealer is obligated to keep taking cards until they have at least 15 points.

### Instructions
1. Create a class called `Blackjack` in the file `blackjack.php`.
1. Add three methods to this class: 
	- `Hit`
	- `Stand`
	- `Surrender`
1. `Hit` should add a card between 1-11.
1. `Stand` should end your turn and start the dealer's turn. (Your point total is saved.)
1. `Surrender` should make you surrender the game. (Dealer wins.)
1. Add a property to this class called `score`. This property should have the value of the player's score at all times.
1. Instantiate the class twice, once for the player and once for the dealer.
1. Create a button on home.php that starts the game when pushed, it should go to game.php.
1. On `game.php` instantiate the Blackjack class twice, insert it into a `player` variable and a `dealer` variable
1. Save these instances in the session (you're gonna need them)
1. Use forms to send to the `game.php` page what the player's action is. (i.e. hit/stand/surrender)
1. Use the class' methods to react to these actions.
1. The final result should be the following:
    - When you `hit` the server should draw a card between 1-11, and add it to your total score. 
    - If you reach >21, then the page should tell you you lost. 
    - If you stand before that, the dealer starts drawing cards until he reaches >15. 
    - The server then needs to check the difference between your result and that of the dealer. 
    - The person with the biggest score (that is still lower than 22) wins the hand (If equal the dealer wins). 
    - As a final option: at any point you need to be able to click `surrender` after which the page tells you you lost and simulates the dealer's score.


[Go back](../)
