<?php

  require "../partials/db_connect.php";

  $company_name = db_quote($_POST["company_name"]);
  $company_url = db_quote($_POST["company_url"]);
  $company_location = db_quote($_POST["company_location"]);
  $job_type_name = db_quote($_POST["job_type_name"]);

  $check = db_query("SELECT count(*) as count_of_results FROM companies WHERE company_name = ".$company_name);
  $check = mysqli_fetch_row($check);

  if($check[0] == 0){
    $new_company = db_query("INSERT INTO `companies`(`company_name`, `company_location`, `company_url`) VALUES (".$company_name.", ".$company_url.", ".$company_location.")");
  }

  $user_id;

  if($result != false){
    $company = db_query("SELECT company_id FROM companies WHERE company_name = ".$company_name);
    $company = mysqli_fetch_row($company);
    $user = db_query("SELECT user_id FROM users WHERE email_address = ".$email_address);
    $user_id = mysqli_fetch_row($user);
    $user_id = $user_id[0];
    $new_worked_at = db_query("INSERT INTO `worked_at`(`user_id`, `company_id`, `current_company`) VALUES(".$user_id.",".$company[0].",1)");
  }

  if($result != false){
    header("Location: show.php?id=".$user_id);
  }

  else {
    echo "Houston, we have a problem.";
    echo db_error();
  }

?>