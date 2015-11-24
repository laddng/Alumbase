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
    $connection = db_connect();
    $result = db_query("SELECT * FROM users OUTER LEFT JOIN worked_at ON user_id WHERE current_company = 1");

    if($result == false){
      header("Location: error.html");
    }
    else {

    }
  ?>
    <tr>
      <td><a href="/user/show.php?id=<?php echo $obj->user_id;?>"><?php echo $obj->first_name." ".$obj->last_name;?></a></td>
      <!-- <td><a href="/company/show.php?company=<?php echo $obj->company_id;?>"><?php echo $obj->company_name;?></a></td> -->
      <td></td>
      <td></td>
      <td><?php echo $obj->major;?></td>
      <td><?php echo $obj->graduation;?></td>
    </tr>
</table>  

<?php require "partials/footer.php"?>