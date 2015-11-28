<?php

  require "../partials/db_connect.php";

  if(isset($_POST['submit'])){
    $user_id = $_POST['user_id'];
    $delete_worked_ats = db_query("DELETE FROM `users` WHERE `user_id` = ".$user_id);
    if($delete_worked_ats != false){
      header("Location: ../index.php");
    }
    else{
      echo db_error();
    }
  }
?>