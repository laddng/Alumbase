<?php
  if(isset($_POST['submit'])){

    require "../partials/db_connect.php";
    $user_id;
    
    // User
    $first_name = db_quote($_POST["first_name"]);
    $last_name = db_quote($_POST["last_name"]);
    $graduation_year = db_quote($_POST["graduation_year"]);
    $major_id = db_quote($_POST["major_id"]);
    $email_address = db_quote($_POST["email_address"]);
    $user_exists = db_exists("SELECT count(*) FROM users WHERE first_name =".$first_name." AND last_name=".$last_name." AND email_address=".$email_address);
    if($user_exists == false){
      $result = db_query("INSERT INTO `users`(`first_name`, `last_name`, `major_id`, `graduation_year`, `email_address`) VALUES (".$first_name.", ".$last_name.", ".$major_id.", ".$graduation_year.", ".$email_address.")");
    }
    else {
      header("Location: show.php?id=".$user_exists[1]);
    }

    if($result != false){
      $user_id = db_exists("SELECT count(*), user_id FROM users WHERE first_name=".$first_name." AND last_name =".$last_name." AND email_address=".$email_address);
      header("Location: show.php?id=".$user_id[1]);
    }

    else {
      echo "Houston, we have a problem.";
      echo db_error();
    }
  }
?>