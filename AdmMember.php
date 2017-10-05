<!--################ -SvendeProve- ######################-->
<?php include ('AdmHeader.php');?>
<!--############################# adgangs tjekker ###################################-->
<?php if (isset($_GET['logout'])) {
  unset($_SESSION['adgang']);
}
if (!isset($_SESSION['adgang']) && $_SESSION['level'] != 1) {
  die(header('location:index.php'));
} ?>

<br><br><br>
<div class="container">
<br><br>

<!--#############################-alle brugere-###################################-->
<section>
<?php
  mysqli_query($dbcon, "SET NAMES utf8");
  $query = "SELECT * FROM users";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h2>Adm. medlemmer</h2></div>
  <div class="panel-body">
    <p>Her er en liste over alle medlemmer som findes i vores DB med mulighed for
      at slette dem</p>
  </div>

  <!-- Table -->
  <table class="table">
    <tr>
      <th>Navn</th>
      <th>E-mail</th>
      <th>Phone</th>
      <th>Photo</th>
      <th>Admistrator</th>
    </tr>
    <!-- start while løkke  -->
  <?php
  while ($row = mysqli_fetch_assoc ($result)) { ?>
    <tr>
      <td><?php echo $row['user_name']; ?></td>
      <td><?php echo $row['user_email']; ?></td>
      <td><?php echo $row['user_phone']; ?></td>
      <td><?php echo $row['user_img']; ?></td>
      <td><?php echo $row['user_role']; ?></td>
      <td><a href="DelMember.php?user_id=<?php echo $row['user_id']; ?>">Slet</a></td>
  <!--<td><a href="EditMember.php?user_id=<?php echo $row['user_id']; ?>">ret</a></td>-->
    </tr>
    <!-- slut while løkke  -->
    <?php } ?>
  </table>

</section>
<?php
    //echo '<pre>Indhold af row ';      print_r ($row);       echo '</pre>';
    //echo '<pre>Indhold af GET ';      print_r ($_GET);      echo '</pre>';
    //echo '<pre>Indhold af POST ';     print_r ($_POST);     echo '</pre>';
    //echo '<pre>Indhold af Session ';  print_r ($_SESSION);  echo '</pre>';
?>
<!--#############################-over out-###################################-->
<?php include ('AdmFooter.php');?>

</div>

</body>
</html>
