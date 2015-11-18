<?php

  // This file is included in every page that needs to query the database

  // Database variables
  $dbhost = "localhost";
  $dbname = "wfu_alumni_db";
  $dbuser = "root";
  $dbpassword = "root";

  // Make connection to database
  $connection = new mysqli($dbhost, $dbuser, $dbpassword, $dbname) or
    die("Could not connect to the database");

?>