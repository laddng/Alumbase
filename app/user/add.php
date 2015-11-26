<?php

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
    exit;
  }

  // Company
  $company_name = db_quote($_POST["company_name"]);
  $company_url = db_quote($_POST["company_url"]);
  $company_location = db_quote($_POST["company_location"]);
  $check = db_exists("SELECT count(*) FROM companies WHERE company_name = ".$company_name);
  if($check == false){
    $new_company = db_query("INSERT INTO `companies`(`company_name`, `company_url`, `company_location`) VALUES (".$company_name.", ".$company_url.", ".$company_location.")");
  }

  // Job Type
  $job_type_name = db_quote($_POST["job_type_name"]);
  $job_type_exists = db_query("SELECT count(*) FROM job_types WHERE job_type_name = ".$job_type_name);
  if($job_type_exists == false){
    $new_job_type = db_query("INSERT INTO `job_types`(`job_type_name`) VALUES (".$job_type_name.")");
  }

  // Worked_at
  if($result != false){
    $company = db_exists("SELECT count(*), company_id FROM companies WHERE company_name = ".$company_name);
    $user = db_exists("SELECT count(*), user_id FROM users WHERE email_address = ".$email_address);
    $user_id = $user[1];
    $job_type = db_exists("SELECT count(*), job_type_id FROM `job_types` WHERE job_type_name = ".$job_type_name);
    $year_start = db_quote($_POST['year_start']);
    $year_end = date("Y");
    $new_worked_at = db_query("INSERT INTO `worked_at`(`user_id`, `company_id`, `job_type_id`, `current_company`, `year_start`, `year_end`) VALUES(".$user[1].",".$company[1].",".$job_type[1].",1,".$year_start.", ".$year_end.")");
  }

  if($result != false){
    header("Location: show.php?id=".$user_id);
  }

  else {
    echo "Houston, we have a problem.";
    echo db_error();
  }

?>