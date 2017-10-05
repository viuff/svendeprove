<!--################ -SvendeProve- ######################-->
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

<br /><br /><br />
<section id="" class="">
  <div class="container">
    <div class="row">

<?php

if ($user_type  == "user") {
  $user_email = $_SESSION['user_email'];
  $query = "SELECT * FROM users WHERE user_email = '$user_email'";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
  $row = mysqli_fetch_assoc ($result);
  echo "<h3>" . $row['user_name'] . ": ". $row['user_grunker']. " grunker</h3>";
}

?>

<!--#############################-albums-###################################-->
<section>
<?php
  mysqli_query($dbcon, "SET NAMES utf8");
  $query = "SELECT * FROM albums";
  $result = mysqli_query ($dbcon, $query) or die (mysqli_error ($dbcon));
?>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">
    <h4>Musikbutikken</h4>
  </div>
  <div class="panel-body">
    <p>Her er en liste over alle de albums som du kan "købe" </p>
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

      <td><a href="album.php?album=<?php echo $row['album_id']; ?>" ><?php echo $row['album_artist']; ?></a></td>
      <td><?php echo $row['album_title']; ?></td>
      <td><?php echo $row['album_genre']; ?></td>
      <td><?php echo $row['album_date']; ?></td>
      <td><?php echo $row['album_price']; ?></td>
      <td> <img src="img/Albums/small/<?php echo $row['album_img']?>" class="img-thumbnail" alt="The Album" width="50" height="50"></td>
      <td><?php echo $row['album_sale_no']; ?></td>


    </tr>
    <!-- slut while løkke  -->
    <?php } ?>
  </table>

</section>
<?php
    echo '<pre>Indhold af row ';      print_r ($row);       echo '</pre>';
    echo '<pre>Indhold af GET ';      print_r ($_GET);      echo '</pre>';
    echo '<pre>Indhold af POST ';     print_r ($_POST);     echo '</pre>';
    echo '<pre>Indhold af Session ';  print_r ($_SESSION);  echo '</pre>';
?>
    </div>
  </div>
</section>

<!--################-- -over out- --######################-->
<?php include ('footer.php');?>
  </body>
</html>
