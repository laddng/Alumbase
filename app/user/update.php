<?php

  require "../partials/db_connect.php";
  $user_id = $_POST['user_id'];
  
  // User
  $first_name = db_quote($_POST["first_name"]);
  $last_name = db_quote($_POST["last_name"]);
  $graduation_year = db_quote($_POST["graduation_year"]);
  $major_id = db_quote($_POST["major_id"]);
  $email_address = db_quote($_POST["email_address"]);
  $result = db_query("UPDATE `users` SET `first_name` = ".$first_name.", `last_name` = ".$last_name.", `major_id`=".$major_id.", `graduation_year` = ".$graduation_year.", `email_address` = ".$email_address." WHERE user_id=".$user_id);

  // Company
  $company_name = db_quote($_POST["company_name"]);
  $company_url = db_quote($_POST["company_url"]);
  $company_location = db_quote($_POST["company_location"]);
  $check = db_exists("SELECT count(*), company_id FROM companies WHERE company_name = ".$company_name);
  if($check == false){
    $new_company = db_query("INSERT INTO `companies`(`company_name`, `company_url`, `company_location`) VALUES (".$company_name.", ".$company_url.", ".$company_location.")");
  }
  else {
    $update_company_info = db_query("UPDATE `companies` SET company_name=".$company_name.", company_url=".$company_url.", company_location=".$company_location." WHERE company_id=".$check[1]);
  }

  // Job Type
  $job_type_name = db_quote($_POST["job_type_name"]);
  $job_type_exists = db_query("SELECT count(*), job_type_id FROM job_types WHERE job_type_name = ".$job_type_name);
  $job_type_exists = mysqli_fetch_row($job_type_exists);
  if($job_type_exists[0] == 0){
    $new_job_type = db_query("INSERT INTO `job_types`(`job_type_name`) VALUES (".$job_type_name.")");
  }
  else {
    $update_job_type = db_query("UPDATE `job_types` SET `job_type_name` = ".$job_type_name." WHERE job_type_id=".$job_type_exists[1]);
  }

  // Worked_at
  if($result != false){
    $year_start = db_quote($_POST['year_start']);
    $year_end = date("Y");
    $new_worked_at = db_query("UPDATE `worked_at` SET `year_start`=".$year_start.", `year_end` = ".$year_end);
  }
  if($result != false){
    header("Location: show.php?id=".$user_id);
  }

  else {
    echo "Houston, we have a problem.";
    echo db_error();
  }

?>