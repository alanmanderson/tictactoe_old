<?php
include_once('../commons/checkauth.php');
$_SESSION["db"]="tictactoe";
include_once('../commons/dbconnect.php');

function getAllCombos($list){
  if(count($list)==1){
    return $list;
  } else {
    return array_merge([$list
  }
}

?>