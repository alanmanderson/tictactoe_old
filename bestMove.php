<?php
$_SESSION["db"]="tictactoe";
include_once('../commons/dbconnect.php');

$action = htmlentities($_GET['action']);
if ($action=="get"){
  $board = htmlentities($_GET['board']);

  $query = "SELECT NextMove,Score FROM moves1 WHERE State='$board' ORDER BY Score DESC LIMIT 1";
  $result = mysql_query($query) or die(mysql_error());
  $row = mysql_fetch_assoc($result);
  echo json_encode($row);
} else if ($action=="set"){
  $win=htmlentities($_GET['winner']);
  $moves=$_GET["moves"];  
}

?>