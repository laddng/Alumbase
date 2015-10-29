<?php

  // This file is included in every page that needs to query the database

  // Database variables
  $dbhost = "";
  $dbname = "";
  $dbuser = "";
  $dbpassword = "";

  // Make connection to database
  $connection = new mysqli($dbhost, $dbname, $dbuser, $dbpassword) or
    die("Could not connect to the database");

?>