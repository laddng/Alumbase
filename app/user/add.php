<?php

  // Connection to database
  require "../partials/db_connect.php";

  // Get user post variables
  $first_name = db_quote($_POST["first_name"]);
  $last_name = db_quote($_POST["last_name"]);
  $graduation_year = db_quote($_POST["graduation_year"]);
  $major_id = db_quote($_POST["major_id"]);

  // Get company post variables
  $company_name = db_quote($_POST["company_name"]);
  $company_url = db_quote($_POST["company_url"]);
  $company_location = db_quote($_POST["company_location"]);
  $job_type_name = db_quote($_POST["job_type_name"]);

  // SQL Injection POST variables checks here

  // Insert user into database
  $result = $connection->query("INSERT INTO users('first_name', 'last_name', 'major_id', 'graduation_year') VALUES (".$first_name.", ".$last_name.", ".$major_id.", ".$graduation_year.")");

  // Check to see if company already exists in db
  $check = $connection->query("SELECT * FROM companies WHERE company_name = ".$company_name.);

  // If company does not exist, create it

  // If company exists, create worked_at entry for user and set current_company to TRUE

  // Get the created user

  // Redirect to new user's show page
  if($result){
    header("Location: show.php?id=0");
  }

?>