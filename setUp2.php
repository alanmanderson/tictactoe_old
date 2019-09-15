<?php
include_once('../commons/checkauth.php');
$_SESSION["db"]="tictactoe";
include_once('../commons/dbconnect.php');

$values = Array("X","","O");
$board = Array("","","","","","","","","");
$counter = 0;
makeMoves($board, "X");
function makeMoves($board, $turn){
  for($i=0;$i<9;$i++){
    $boardCpy = $board;
    if ($boardCpy[$i]==""){
      $boardCpy[$i]=$turn;
      $winner = checkWinner($boardCpy);
      $strBoard = implode(",",$board);
      if ($winner){
	$query = "INSERT IGNORE INTO moves1 (State,NextMove,Score) VALUES ('$strBoard',$i,100)";
	$result = mysql_query($query) or die(mysql_error());
      } else{
	$query = "INSERT IGNORE INTO moves1 (State,NextMove,Score) VALUES ('$strBoard',$i,50)";
	$result = mysql_query($query);
	makeMoves($boardCpy, ($turn=="X")?"O":"X");
      }
    }
  }
}

function checkWinner($board){
  $wins = Array(Array(0,1,2),Array(3,4,5),Array(6,7,8),Array(0,3,6),Array(1,4,7),Array(2,5,8),Array(0,4,8),Array(2,4,6));
  foreach($wins as $w){
    if ($board[$w[0]]!="" && 
	$board[$w[0]]==$board[$w[1]] &&
	$board[$w[1]]==$board[$w[2]]){
      return true;
    }
  }
  return false;
}

?>