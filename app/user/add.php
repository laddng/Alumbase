<?php

  require "../partials/db_connect.php";
  $user_id;
  
  // User
  $first_name = db_quote($_POST["first_name"]);
  $last_name = db_quote($_POST["last_name"]);
  $graduation_year = db_quote($_POST["graduation_year"]);
  $major_id = db_quote($_POST["major_id"]);
  $email_address = db_quote($_POST["email_address"]);
  $result = db_query("INSERT INTO `users`(`first_name`, `last_name`, `major_id`, `graduation_year`, `email_address`) VALUES (".$first_name.", ".$last_name.", ".$major_id.", ".$graduation_year.", ".$email_address.")");

  // Company
  $company_name = db_quote($_POST["company_name"]);
  $company_url = db_quote($_POST["company_url"]);
  $company_location = db_quote($_POST["company_location"]);
  $check = db_query("SELECT count(*) as count_of_results FROM companies WHERE company_name = ".$company_name);
  $check = mysqli_fetch_row($check);
  if($check[0] == 0){
    $new_company = db_query("INSERT INTO `companies`(`company_name`, `company_location`, `company_url`) VALUES (".$company_name.", ".$company_url.", ".$company_location.")");
  }

  // Job Type
  $job_type_name = db_quote($_POST["job_type_name"]);
  $job_type_exists = db_query("SELECT count(*) as count_of_job_types FROM job_types WHERE job_type_name = ".$job_type_name);
  $job_type_exists = mysqli_fetch_row($job_type_exists);
  if($job_type_exists == 0){
    $new_job_type = db_query("INSERT INTO `job_types`(`job_type_name`) VALUES (".$job_type_name.")");
  }

  // Worked_at
  if($result != false){
    $company = db_query("SELECT company_id FROM companies WHERE company_name = ".$company_name);
    $company = mysqli_fetch_row($company);
    $user = db_query("SELECT user_id FROM users WHERE email_address = ".$email_address);
    $user_id = mysqli_fetch_row($user);
    $user_id = $user_id[0];
    $job_type = db_query("SELECT job_type_id FROM job_types WHERE job_type_name = ".$job_type_name);
    $job_type = mysqli_fetch_row($job_type);
    $new_worked_at = db_query("INSERT INTO `worked_at`(`user_id`, `company_id`, `job_type_id`, `current_company`) VALUES(".$user_id.",".$company[0].",".$job_type[0].",1)");
  }

  if($result != false){
    header("Location: show.php?id=".$user_id);
  }

  else {
    echo "Houston, we have a problem.";
    echo db_error();
  }

?>