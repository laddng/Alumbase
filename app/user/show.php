<?php require "../partials/header.php";?>

<?php

  $user_id = $_GET["id"];
  $result = db_query("SELECT * FROM users NATURAL JOIN majors WHERE users.user_id=".$user_id."");
  $user_info = mysqli_fetch_assoc($result);
  $work_info = db_select("SELECT * FROM worked_at, companies, job_types WHERE worked_at.user_id = ".$user_id." AND worked_at.company_id = companies.company_id AND worked_at.job_type_id = job_types.job_type_id ORDER BY worked_at.year_end DESC");
?>
  <h2><?php echo $user_info['first_name']." ".$user_info['last_name'];?></h2>
  <ul>
    <li><em><?php echo $user_info['major_name']." ".$user_info['graduation_year'];?></em></li>
    <li><b>Email: </b><a href="mailto:<?php echo $user_info['email_address'];?>"><?php echo $user_info['email_address'];?></a></li>
    <br>
    <li><a href="edit.php?user_id=<?php echo $user_info['user_id'];?>">Edit <?php echo $user_info['first_name'];?>'s profile</a></li>
  </ul>
<?php
  foreach ($work_info as $work) {
?>
  <div class="box">
    <ul>
      <li><b><a href="../company/show.php?company=<?php echo $work['company_id'];?>"><?php echo $work['company_name'];?></a></b> - <?php echo $work['job_type_name'];?></li>
      <li><?php echo $work['company_location'];?></li>
      <li><a href="http://<?php echo $work['company_url'];?>"><?php echo $work['company_url'];?></a></li>
      <li><em><?php echo $work['year_start']." - ". $work['year_end'];?></em></li>
      <br>
      <li><a href="../company/edit.php?company_id=<?php echo $work['company_id'];?>&user_id=<?php echo $user_info['user_id'];?>&job_type_id=<?php echo $work['job_type_id'];?>">Edit work experience</a></li>
    </ul>
  </div>
<? } ?>
  <a href="../company/create.php?user_id=<?php echo $user_info['user_id'];?>">+ Add work experience</a>
  <form action="delete.php" method="POST">
    <input type="hidden" name="user_id" value="user_id" value="<?php echo $_GET['user_id'];?>">
    <br>
    <input type="submit" class="delete" value="Delete User" name="submit">
  </form>

<?php require "../partials/footer.php";?>