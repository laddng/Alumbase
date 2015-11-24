<?php require "partials/header.php";?>

<a href="user/create.php">+ Add New Alum</a>
<br><br>
<table>
  <tr>
    <th>Name</th>
    <th>Company</th>
    <th>Job Position</th>
    <th>Major</th>
    <th>Graduation Year</th>
    <th>Email Address</th>
  </tr>

  <?php
    $result = db_select("SELECT * FROM users NATURAL JOIN majors");

    if($result == false){
      header("Location: error.html");
    }
    else {
      foreach ($result as $row) {
  ?>
    <tr>
      <td><a href="/user/show.php?id=<?php echo $row['user_id'];?>"><?php echo $row['first_name']." ".$row['last_name'];?></a></td>
      <!-- <td><a href="/company/show.php?company=<?php echo $obj->company_id;?>"><?php echo $obj->company_name;?></a></td> -->
      <td></td>
      <td></td>
      <td><?php echo $row['major_name'];?></td>
      <td><?php echo $row['graduation_year'];?></td>
      <td><?php echo $row['email_address'];?></td>
    </tr>
  <?php }} ?>
</table>  

<?php require "partials/footer.php"?>