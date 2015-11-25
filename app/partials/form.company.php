<?php 

  $user_info;

  if(isset($_GET["user_id"])){
    $user_id = $_GET["user_id"];
    $result = db_select("SELECT * FROM worked_at WHERE user_id=".$user_id." LIMIT 1");
    echo "<input type='hidden' name='user_id' value=".$user_id.">";
    foreach ($result as $row) {
      $user_info = $row;
    }
  }
?>
  <label for="company_name">Company Name</label>
  <br>
  <input type="text" name="company_name" placeholder="Enter name of company">
  <br>
  <label for="company_location">Company Location</label>
  <br>
  <input type="text" name="company_location" placeholder="Enter location of company">
  <br>
  <label for="company_url">Company URL</label>
  <br>
  <input type="text" name="company_url" placeholder="Enter the URL of the company">
  <br>
  <label for="job_type_name">Job Position</label>
  <br>
  <input type="text" placeholder="Enter the name of job position" name="job_type_name">
  <br>
  <label for="year_start">Year Started</label>
  <br>
  <input type="text" placeholder="Enter the year started" name="year_start">
  <br>
  <label for="year_end">Year Ended</label>
  <br>
  <input type="text" placeholder="Enter the year ended" name="year_end">
  <br>
  <input type="submit" value="Submit">