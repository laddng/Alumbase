<?php 

  $obj;

  if(isset($_GET["user_id"])){
    $user_id = $_GET["user_id"];
    $result = $connection->query("SELECT * FROM users WHERE user_id=$user_id");
    $obj = $result->fetch_object();
    echo "<input type='hidden' name='user_id' value=".$user_id.">";
  }
?>
  <label for="first_name">First Name</label>
  <br>
  <input type="text" value="<?php if(isset($_GET['user_id'])){ echo $obj->first_name;}?>" name="first_name" placeholder="Enter their first name">
  <br>
  <label for="last_name">Last Name</label>
  <br>
  <input type="text" value="<?php if(isset($_GET['user_id'])){ echo $obj->last_name;}?>" name="last_name" placeholder="Enter their last name">
  <br>
  <label for="major_id">Major</label>
  <br>
  <select name="major_id">
    <?php
      $result = db_select("SELECT major_id, major_name FROM majors");
      foreach ($result as $major) {
        if(isset($_GET["user_id"]) && ($major['major_id'] == $obj->major_id)){
          $selected = "SELECTED";
        }
        else {
          $selected = "";
        }
        echo "<option value=".$major['major_id']." ".$selected.">".$major['major_name']."</option>";
      }
    ?>
  </select>
  <br>
  <label for="graduation_year">Year of Graduation</label>
  <br>
  <input type="text" value="<?php if(isset($_GET['user_id'])){ echo $obj->graduation_year;}?>" name="graduation_year" placeholder="Enter their year of graduation">
  <br>
  <br>
  <hr>
  <h4>Company Currently Working At</h4>
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
  <input type="submit" value="Submit">