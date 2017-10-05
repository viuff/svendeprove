<!--################ -SvendeProve- ######################-->
<?php include ('AdmHeader.php');?>
<!--############################# adgangs tjekker ###################################-->
<?php if (isset($_GET['logout'])) {
  unset($_SESSION['adgang']);
}

if (!isset($_SESSION['adgang']) || $_SESSION['level'] != 1) {
  die(header('location:index.php'));
} ?>

<br><br><br>
<div class="container">
<br><br>

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
    <h2>Adm. albums</h2>
  </div>
  <div class="panel-body">
    <p>Her er en liste over alle de albummer som findes i vores DB med mulighed for
      at rette dem</p>
  </div>

  <!-- Table -->
<?php   echo "udfywieorwoierutywert::::" . $_SESSION['level']; ?>
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
      <td><?php echo $row['album_img']; ?></td>
      <td><?php echo $row['album_sale_no']; ?></td>
      <td><a href="DelAlbum.php?album_id=<?php echo $row['album_id']; ?>">Slet</a></td>
      <td><a href="EditAlbum.php?album_id=<?php echo $row['album_id']; ?>">ret</a></td>
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
