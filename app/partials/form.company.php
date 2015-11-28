<?php 

  $vars = "";

  if(!empty($_GET["company_id"] && $_GET["user_id"] && $_GET["job_type_id"])){
    $vars = ($_GET["company_id"] && $_GET["user_id"] && $_GET["job_type_id"]);
    $company_id = $_GET["company_id"];
    $user_id = $_GET["user_id"];
    $job_type_id = $_GET["job_type_id"];

    echo "<input type='hidden' name='user_id' value=".$user_id.">";
    echo "<input type='hidden' name='company_id' value=".$company_id.">";
    echo "<input type='hidden' name='job_type_id' value=".$job_type_id.">";

    $company_info = db_select("SELECT * FROM companies WHERE company_id=".$company_id);
    $work_info = db_select("SELECT * FROM worked_at WHERE company_id=".$company_id." AND job_type_id=".$job_type_id." AND user_id=".$user_id);
    $job_info = db_select("SELECT * FROM job_types WHERE job_type_id=".$job_type_id);
  }
  if(!empty($_GET["user_id"])){
    $user_id = $_GET['user_id'];
    echo "<input type='hidden' name='user_id' value=".$user_id.">";
  }
?>
  <label for="company_name">Company Name</label>
  <br>
  <input type="text" value="<?php if($vars != ""){echo $company_info[0]['company_name'];}?>" name="company_name" placeholder="Enter name of company">
  <br>
  <label for="company_location">Company Location</label>
  <br>
  <input type="text" value="<?php if($vars != ""){echo $company_info[0]['company_location'];}?>" name="company_location" placeholder="Enter location of company">
  <br>
  <label for="company_url">Company URL</label>
  <br>
  <input type="text" value="<?php if($vars != ""){echo $company_info[0]['company_url'];}?>" name="company_url" placeholder="Enter the URL of the company">
  <br>
  <label for="job_type_name">Job Position</label>
  <br>
  <input type="text" value="<?php if($vars != ""){echo $job_info[0]['job_type_name'];}?>" placeholder="Enter the name of job position" name="job_type_name">
  <br>
  <label for="year_start">Year Started</label>
  <br>
  <input type="text" value="<?php if($vars != ""){echo $work_info[0]['year_start'];}?>" placeholder="Enter the year started" name="year_start">
  <br>
  <label for="year_end">Year Ended</label>
  <br>
  <input type="text" value="<?php if($vars != ""){echo $work_info[0]['year_end'];}?>" placeholder="Enter the year ended" name="year_end">
  <br>
  <label for="current_company">Current Company</label>
  <input type="checkbox" <?php if(($vars != "")&& ($work_info[0]['current_company'] == 1)){echo "CHECKED";}?> name="current_company">
  <br>
  <Br>
  <input type="submit" value="Submit">