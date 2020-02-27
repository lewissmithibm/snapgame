<?php

//SNAP GAME

//include the snap functions
include_once 'snap_functions.php';
$snapFunctions = new snapFunctions;

//Get the number of people from the URL
$players = $snapFunctions->requestQS("players");

//check player count is minimun 2
if($players < 2){
  echo "Player count must be > 2, you fool";
  die;
}

//Build a shuffled deck of cards
$deck = $snapFunctions->buildDeck();

//Shuffle deck
shuffle($deck);

//create array of cards for each player

//hands array created to keep record of all hands
$handsArray = array();
for($i = 1; $i <= $players; $i++){
  //array of cards for each player
  $playerHandArray = array();
  //Add players hand to array of all hands
  $handsArray[] = $playerHandArray;
}

//Now we have an array for each player inside our hands array, lets deal the cards
//TODO allow for a number of players other than 2
for($i = 0; $i < 26; $i++){
  $handsArray[0][] = array_shift($deck);
  $handsArray[1][] = array_shift($deck);
}

//Use get winner function to return the winner
echo $snapFunctions->getWinner($handsArray);

?>
