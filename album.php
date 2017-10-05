<?php
  include('includes/session_start.php');
  if (isset($_SESSION['adgang'])) {
    include ('UsererHeader.php');
      $user_type = "user";
  } else {
        include ('header.php');
        $user_type = "none";
  }
?>

<br> <br><br><br>
<?php

if ($user_type  == "user") {
  $user_email = $_SESSION['user_email'];
  $query = "SELECT * FROM users WHERE user_email = '$user_email'";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
  $row = mysqli_fetch_assoc ($result);
  //echo "<h3>" . $row['user_name'] . ": ". $row['user_grunker']. " grunker</h3>";
  $_POST['$row']=$row;
}

  $album_id = $_GET['album'];
  mysqli_query($dbcon, "SET NAMES utf8");
  $query = "SELECT * FROM albums WHERE album_id =  $album_id ";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
  $row = $_POST['$row'];
?>
<div class="container">
<section>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h2><?php echo "<h3>" . $row['user_name'] . ": ". $row['user_grunker']. " grunker</h3>";?></h2>
  </div>
  <div class="panel-body">
    <p>Her er en du gerne vil købe</p>
  </div>

<!-- Table -->
<table class="table">
  <tr>
    <th>Artist</th>
    <th>Navn</th>
    <th>Genre</th>
    <th>Dato</th>
    <th>Pris</th>
    <th>img</th>
    <th>Antal solgt</th>
  </tr>
  <!-- start while løkke  -->
<?php
  while ($row = mysqli_fetch_assoc ($result)) { ?>
      <tr>

        <td><?php echo $row['album_artist']; ?></td>
        <td><?php echo $row['album_title']; ?></td>
        <td><?php echo $row['album_genre']; ?></td>
        <td><?php echo $row['album_date']; ?></td>
        <td><?php echo $row['album_price']; ?></td>
        <td> <img src="img/Albums/big/<?php echo $row['album_img']?>" class="img-thumbnail" alt="The Album" width="200" height="200"></td>
        <td><?php echo $row['album_sale_no']; ?></td>

      </tr>
      <!-- slut while løkke  -->
    </table>

  <?php } ?>

<?php  if ($user_type  == "user") { ?>

  <!--<input type="button" value="KØB NU" />-->
  <form><button type="submit" name="kob" class="btn btn-info" id="Button">KØB NU</button></form>

<?php } else { ?>

<form action="login.php"><button type="submit" name="" class="btn btn-info" id="Button">Log ind for at købe</button></form>

  <?php } ?>

</section>

<!--################-- -over out- --######################-->
<?php include ('footer.php');?>
</div>
</div>
  </body>
</html>
<?php
    echo '<pre>Indhold af row ';      print_r ($row);       echo '</pre>';
    echo '<pre>Indhold af GET ';      print_r ($_GET);      echo '</pre>';
    echo '<pre>Indhold af POST ';     print_r ($_POST);     echo '</pre>';
    echo '<pre>Indhold af Session ';  print_r ($_SESSION);  echo '</pre>';
?>
