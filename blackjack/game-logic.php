<?php


    function newGame(){
        global $player;
        global $dealer;
        $player->reset();
        $dealer->reset();
        $player->isTurn = true;
        $dealer->isTurn = false;
    }


    function dealerTurn(){

        global $dealer;

        while($dealer->score < 15){
            $dealer->hit();
        }
        if($dealer->score >= 15){
            $dealer->isTurn = false;
            compare_score();
        }

    }

    function compare_score(){

        global $dealer;
        global $player;
        $playerHasLost = false;
        $dealerHasLost = false;

        if ($player->hasSurrendered){
            $playerHasLost = true;
            //$dealer->amountOfWins ++;
        }
        else {
            if ($dealer->score > 21){
                $dealerHasLost = true;
            }
            if($player->score > 21){
                $playerHasLost = true;
            }
        }


        if ($playerHasLost == false && $dealerHasLost == false){

            if($player->score > $dealer->score){
                $player->amountOfWins++;
            } elseif ($dealer->score > $player->score){ 
                $dealer->amountOfWins++;
            } else {
                echo 'Tie';
            }
        } 
            elseif($playerHasLost == true && $dealerHasLost == false){
                $dealer->amountOfWins++;
            } elseif ($playerHasLost == false && $dealerHasLost == true){
                $player->amountOfWins++;
            } else {
                echo 'tie';
            }

        


    }



?>