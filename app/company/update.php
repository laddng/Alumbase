<?php

  require "../partials/db_connect.php";
  $company_id = $_POST['company_id'];

  if(isset($company_id)){
    $company_name = db_quote($_POST["company_name"]);
    $company_url = db_quote($_POST["company_url"]);
    $company_location = db_quote($_POST["company_location"]);
    $job_type_name = db_quote($_POST["job_type_name"]);
    $year_start = db_quote($_POST["year_start"]);
    $year_end = db_quote($_POST["year_end"]);
    $user_id = db_quote($_POST["user_id"]);
    $job_type_id = db_quote($_POST["job_type_id"]);
    if(isset($_POST["current_company"])){
      $current_company = 1;
    }
    else {
      $current_company = 0;
    }

    // Create company if it doesn't exist
    $check = db_exists("SELECT count(*) FROM companies WHERE company_name = ".$company_name);
    if($check == false){
      $new_company = db_query("INSERT INTO `companies`(`company_name`, `company_location`, `company_url`) VALUES (".$company_name.", ".$company_location.", ".$company_url.")");
    }

    // Create job_type
    $job_type_exists = db_exists("SELECT count(*), job_type_id FROM job_types WHERE job_type_name =".$job_type_name);
    if($job_type_exists == false){
      $new_job_type = db_query("INSERT INTO `job_types`(`job_type_name`) VALUES (".$job_type_name.")");
    }

    // Create worked at
    $company = db_exists("SELECT count(*), company_id FROM companies WHERE company_name = ".$company_name);
    $job_type = db_exists("SELECT count(*), job_type_id FROM job_types WHERE job_type_name=".$job_type_name);
    $old_worked_at = db_query("DELETE FROM `worked_at` WHERE user_id=".$user_id." AND company_id = ".$company_id." AND job_type_id=".$job_type_id);
    $new_worked_at = db_query("INSERT INTO `worked_at`(`user_id`, `company_id`, `job_type_id`, `year_start`, `year_end`, `current_company`) VALUES(".$user_id.",".$company[1].", ".$job_type[1].", ".$year_start.", ".$year_end.", ".$current_company.")");

    if($new_worked_at != false && $old_worked_at != false){
      header("Location: show.php?company=".$company[1]);
    }

    else {
      echo "Houston, we have a problem.";
      echo db_error();
    }
  }
?>