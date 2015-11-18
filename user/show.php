<?php require "../header.php";?>

<?php

  // The ID of the current user
  $user_id = $_GET["id"];
  $result = $connection->query("SELECT * from users where user_id=$user_id");

  while($obj = $result->fetch_object()){

?>
  <h2><?php echo $obj->first_name." ".$obj->last_name;?></h2>

<?
  }
  $result->close();
?>

<?php require "footer.php";?>