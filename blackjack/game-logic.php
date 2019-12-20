<?php


    function newGame(){
        global $player;
        global $dealer;
        $player->score = 0;
        $dealer->score = 0;
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
        }

    }

    function compare_score(){

        global $dealer;
        global $player;

        if($dealer->score > 21 || $player->score > 21){
            
        }
        


    }



?>