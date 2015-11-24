<?php

  // Connection to database
  require "../partials/db_connect.php";

  // Get user post variables
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];
  $graduation_year = $_POST["graduation_year"];
  $major_id = $_POST["major_id"];

  // Get company post variables
  $company_name = $_POST["company_name"];
  $company_url = $_POST["company_url"];
  $company_location = $_POST["company_location"];
  $job_type_name = $_POST["job_type_name"];

  // SQL Injection POST variables checks here

  // Insert user into database
  $result = $connection->query("INSERT INTO users('first_name', 'last_name', 'major_id', 'graduation_year') VALUES ('$first_name', '$last_name', '$major_id', '$graduation_year')");

  echo "Success";

  // Check to see if company already exists in db
  $check = $connection->query("SELECT * FROM companies WHERE company_name = $company_name");

  // If company does not exist, create it

  // If company exists, create worked_at entry for user and set current_company to TRUE

  // Get the created user

  // Redirect to new user's show page
  if($result){
    header("Location: show.php?id=0");
  }

?>