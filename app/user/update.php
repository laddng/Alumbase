<?php

  require "../partials/db_connect.php";
  $user_id = $_POST['user_id'];

  if(isset($user_id)){
    $first_name = db_quote($_POST["first_name"]);
    $last_name = db_quote($_POST["last_name"]);
    $graduation_year = db_quote($_POST["graduation_year"]);
    $major_id = db_quote($_POST["major_id"]);
    $email_address = db_quote($_POST["email_address"]);
    $result = db_query("UPDATE `users` SET `first_name` = ".$first_name.", `last_name` = ".$last_name.", `major_id`=".$major_id.", `graduation_year` = ".$graduation_year.", `email_address` = ".$email_address." WHERE user_id=".$user_id);

    if($result != false){
      header("Location: show.php?id=".$user_id);
    }

    else {
      echo "Houston, we have a problem.";
      echo db_error();
    }
  }
?>