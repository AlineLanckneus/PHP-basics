<?php

    class Blackjack {


        public $score = 0;
        public $isTurn = false;
        public $hasSurrendered = false;
        public $amountOfWins = 0;

        // add a card between 1-11
        public function hit(){
            $this->score += rand(1,11);
        }
        // end player's turn and start dealer's turn
        public function stand(){
            $this->isTurn = false;
        }
        // player surrenders the game
        public function surrender(){
            $this->isTurn = false;
            $this->hasSurrendered = true;
        }
        public function reset(){
            $this->score = 0;
            $this->hasSurrendered = false;
        }

    }








?>