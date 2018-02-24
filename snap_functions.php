<?php

/*

ALL FUNCTIONS USED IN THE SNAP GAME

*/

class snapFunctions{
  //----------------------------------------------------------------------------------
  //build deck of cards
  function buildDeck(){
    //Suites array
    $suites = array("S", "H", "C", "D");
    //Numbers array
    $numbers = array("2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A");

    //Build the complete unshuffeled deck
    $deck = array();
    foreach($suites as $suit){
      foreach($numbers as $number){
        $deck[] = array("number"=>$number, "suit"=>$suit);
      }
    }
    return $deck;
  }
  //----------------------------------------------------------------------------------
  //get specific query string
  function requestQS($xParam) {
      if (!isset($_GET[$xParam]))
      {
          $_GET[$xParam] = "";
      }

      return $_GET[$xParam];
  }
  //----------------------------------------------------------------------------------
  //get the winner
  function getWinner($handsArray){
    //Array for "Played cards"
    $playedCards = array();

    //loop through the cards
    for($i = 0; $i < 26; $i++){
      //Set player 1's number
      $number1 = $handsArray[0][$i]['number'];
      //Set player 2's number
      $number2 = $handsArray[1][$i]['number'];

      echo $number1 . $handsArray[0][$i]['suit'] . "<br />" . $number2 . $handsArray[1][$i]['suit'] . "<br />";

      //check if last card matches
      if(end($playedCards) == $number1){
        return "player 1 wins";
      }
      //Add player 1 number to played cards
      array_push($playedCards, $number1);

      //check if last card matches
      if(end($playedCards) == $number2){
        return "player 2 wins";
      }
      //Add player 2 number to played cardss
      array_push($playedCards, $number2);
    }
  }

}

?>
