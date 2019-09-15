<?php
include_once('../commons/checkauth.php');
$_SESSION["db"]="tictactoe";
include_once('../commons/dbconnect.php');

$values = Array("X","","O");
$board = "";
foreach($values as $val1){
  foreach($values as $val2){
    foreach($values as $val3){
      foreach($values as $val4){
	foreach($values as $val5){
	  foreach($values as $val6){
	    foreach($values as $val7){
	      foreach($values as $val8){
		foreach($values as $val9){
		  $board = $val1.",".$val2.",".$val3.",".$val4.",".$val5.",".$val6.",".$val7.",".$val8.",".$val9;
		  $query = "INSERT INTO moves (BoardState,Score) VALUES ('$board',.5)";
		  #$result = mysql_query($query) or die(mysql_error());
		}
	      }
	    }
	  }
	}
      }
      echo "1/9 more done!";
    }
  }
}
?>